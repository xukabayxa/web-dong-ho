<?php

namespace App\Http\Controllers\Front;

use App\Model\Admin\Banner;
use App\Model\Admin\CategorySpecial;
use App\Model\Admin\Manufacturer;
use App\Model\Admin\Origin;
use App\Model\Admin\Policy;
use App\Model\Admin\PostCategorySpecial;
use App\Model\Admin\Store;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use Vanthao03596\HCVN\Models\Province;
use Yajra\DataTables\DataTables;
use Validator;
use \stdClass;
use Response;
use App\Http\Controllers\Controller;
use App\Helpers\FileHelper;
use \Carbon\Carbon;
use Illuminate\Validation\Rule;
use App\Model\Admin\Category;
use App\Model\Admin\Product;
use App\Model\Admin\Post;
use App\Model\Admin\PostCategory;
use App\Model\Admin\Review;
use App\Model\Admin\Config;
use DB;
use Mail;
use SluggableScopeHelpers;

class FrontController extends Controller
{
    protected $view;

    public function __construct(Agent $agent)
    {
        $this->view = 'front2';
        if ($agent->isMobile()) {
            $this->view .= '.mobiles';
        }
    }

    /** trang chủ
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $reviews = Review::orderBy('created_at')->get();

        // lấy danh mục có show_home_page = 1 (chỉ có những danh mục parent_id = 0 mới chỉnh được show_home_page)
        $categories = Category::query()
            ->where('show_home_page', true)
            ->orderBy('order_number')->get();

        // lấy danh mục sản phẩm đổ ra trang chủ (lấy 6 sp)
        $categories = $categories->map(function ($cate) {
            $cate->products = Product::query()
                ->where(function ($q) use ($cate){
                    $q->whereIn('cate_id', $cate->getChilds()->pluck('id'))
                        ->orWhere('cate_id', $cate->id);
                })
                ->where('status', 1)->latest()->limit(6)->get();
            return $cate;
        });

        // banner trái
        $bannersLeft = Banner::query()->where(['position' => 'left'])->latest()->take(4)->get();

        // banner phải
        $bannersRight = Banner::query()->where(['position' => 'right'])->latest()->take(3)->get();

        // danh mục sản phẩm cho mobile
        $productCategories = Category::query()->with(['childs', 'manufacturers', 'image'])
            ->where(['type' => 1, 'parent_id' => 0, 'show_home_page' => 1])
            ->latest()
            ->get();
        // lấy tin tức cho mobile
        $postCategorySpecial = CategorySpecial::query()->with('posts')
            ->where(['type' => 20, 'show_home_page' => 1])->orderBy('order_number')->get();

        // lấy danh mục đặc biệt
        $categorySpecial = CategorySpecial::query()->with('products')
            ->where(['type' => 10, 'show_home_page' => 1])->orderBy('order_number')->get();

        return view($this->view . '.index', compact('reviews', 'categories', 'bannersLeft',
            'bannersRight', 'productCategories', 'categorySpecial', 'postCategorySpecial'));
    }


    /**
     * trang danh mục sản phẩm
     * @param Request $request
     * @param $parent_slug
     * @param null $code_manufacturer
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     */
    public function getCategory(Request $request, $parent_slug, $code_manufacturer = null)
    {
        // check nếu slug này có con thì trả về view con, ko có thì view cha
        $cate = Category::findBySlug($parent_slug);
        $origins = Origin::getForSelect();

        // cho mobile
        $bannersRight = Banner::query()->where(['position' => 'right'])->latest()->take(3)->get();

        // th ko có cate con
        if ($cate->getChilds()->isEmpty()) {
            $cateParent = Category::query()->where('id', $cate->parent_id)->first();

            if (!$cateParent) {
                $manufacturers = $cate->manufacturers;
                return view($this->view . '.product_category', compact('cate', 'manufacturers',
                    'origins', 'bannersRight'));
            }

            $manufacturers = $cateParent->manufacturers;

            if ($code_manufacturer) {
                $manu = Manufacturer::query()->where('code', $code_manufacturer)->first();

                return view($this->view . '.product_category', compact('cate', 'manufacturers',
                    'manu', 'origins', 'bannersRight'));
            }

            return view($this->view . '.product_category', compact('cate', 'manufacturers',
                'origins', 'bannersRight'));
        } else {
            // lấy ra tất cả cate con (hiện tại dừng lại level 2)
            $childCategories = $cate->getChilds();

            $manufacturers = $cate->manufacturers;

            if ($code_manufacturer) {
                $manu = Manufacturer::query()->where('code', $code_manufacturer)->first();

                return view($this->view . '.product_category', compact('cate', 'manufacturers', 'manu',
                    'origins', 'bannersRight'));
            }

            return view($this->view . '.product_category_v2', compact('childCategories', 'cate',
                'manufacturers', 'origins', 'bannersRight'));
        }
    }

    /** load more sản phẩm
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function loadMoreProduct(Request $request)
    {
        $cate = Category::query()->find($request->cate_id);
        $childCateIds = $cate->getChilds()->pluck('id');

        if ($request->id > 0) {
            $products = Product::filter($request->filters)
                ->where('id', '<', $request->id);
        } else {
            $products = Product::filter($request->filters);
        }

        $products = $products->where(function ($q) use ($childCateIds, $request) {
            $q->where('cate_id', $request->cate_id)
                ->orWhereIn('cate_id', $childCateIds);
        })->latest('id')->limit(15)->get();

        $html = '';
        if ($products->isNotEmpty()) {
            foreach ($products as $product) {
                $html .= view($this->view . '.partials.load_more_product', compact('product', 'cate'))->render();
                $p_last_id = $product->id;
            }
        } else {
            $p_last_id = null;
        }

        return Response::json([
            'html' => $html,
            'p_id' => $p_last_id,
        ]);
    }

    /**
     * @param Request $request
     * @return string
     * @throws \Throwable
     */
    public function filterProductCategoryV2(Request $request)
    {
        // lấy ra tất cả cate con
        $cate = Category::find($request->cate_id);
        $query = Category::query()->with(['image', 'products'])->where('parent_id', $request->cate_id)
            ->orderBy('sort_order', 'asc');

        if ($request->filters) {
            $filters = array_merge(...array_values($request->filters));
            if (@$filters['child_cate_ids']) {
                $childCateIds = $filters['child_cate_ids'];
                $query->whereIn('id', $childCateIds);
            }

            if (@$filters['manu']) {
                $manu_ids = $filters['manu'];
                $query->with(['products' => function ($q) use ($manu_ids) {
                    $q->whereIn('manufacturer_id', $manu_ids);
                }]);
            }

            if (@$filters['origin']) {
                $origin_ids = $filters['origin'];
                $query->with(['products' => function ($q) use ($origin_ids) {
                    $q->whereIn('origin_id', $origin_ids);
                }]);
            }

            if (@$filters['prices']) {
                $prices = $filters['prices'];
                $query->with(['products' => function ($q) use ($prices) {
                    $q->where(function ($q) use ($prices) {
                        foreach ($prices as $price) {
                            $price = json_decode($price, true);
                            if (count($price) > 1) {
                                $q->orWhere(function ($q) use ($price) {
                                    $q->where('price', '>=', $price[0])
                                        ->where('price', '<=', $price[1]);
                                });
                            } else {
                                if ($price[0] == 16000000) {
                                    $q->orWhere('price', '>=', 15000000);
                                } else {
                                    $q->orWhere('price', '<=', $price[0]);
                                }
                            }
                        }
                    });
                }]);
            }

            if (@$filters['sorts']) {
                $sorts = $filters['sorts'];
                $query->with(['products' => function ($q) use ($sorts) {
                    if(in_array('new_asc', $sorts)) {
                        $q->orderBy('products.created_at', 'desc');
                    }
                    if(in_array('price_asc', $sorts)) {
                        $q->orderBy('products.price', 'asc');
                    }
                    if(in_array('price_desc', $sorts)) {
                        $q->orderBy('products.price', 'desc');
                    }
                }]);
            }

        }

        $output = '';

        foreach ($query->get()->map(function ($cate) {
            $cate->products = $cate->products->take(6);
            return $cate;
        }) as $category) {
            $output .= view($this->view . '.partials.result_filter_product_v2', compact('category', 'cate'))->render();
        }

        return $output;
    }

    /**
     * trang chi tiết sản phẩm
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getProduct($slug)
    {
        $product = Product::findSlug($slug);

        $cate = $product->category;
        $relate_products = Product::getRelate($product->id, $cate->id);
        $stores = Store::query()->latest()->get();
        $config = Config::query()->first();

        // cho mobile
        $bannersRight = Banner::query()->where(['position' => 'right'])->latest()->take(3)->get();

        return view($this->view . '.product_detail', compact('product', 'cate',
            'relate_products', 'stores', 'config', 'bannersRight'));
    }

    /** trang danh mục tin tức
     * @param Request $request
     * @param $parent_slug
     * @param null $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPostCategory(Request $request, $parent_slug, $slug = null)
    {
        // list danh mục tin tức bên phải
        $categories = PostCategory::query()
            ->where(['parent_id' => 0, 'show_home_page' => 1])
            ->orderBy('order_number')->get();

        // bài viết mới nhất
        $postsLatest = Post::query()->latest()->take(5)->get();

        // lấy danh mục đặc biệt
        $categoryPostSpecial = CategorySpecial::query()->with('posts')
            ->where(['type' => 20, 'show_home_page' => 1])
            ->orderBy('order_number')->get();

        $categoryPostSpecial = $categoryPostSpecial->map(function ($cate) {
            $cate->posts = $cate->posts->take(5);
            return $cate;
        });

        // cho mobile
        $bannersRight = Banner::query()->where(['position' => 'right'])->latest()->take(3)->get();

        if ($slug) {
            // danh mục cha
            $parent = PostCategory::findBySlug($parent_slug);

            // danh mục con
            $cate = PostCategory::findBySlug($slug);

            // bài viết danh mục con
            $postCateSecond = $cate->posts()->paginate(1);

            return view($this->view . '.news', compact('postCateSecond', 'cate', 'categories',
                'postsLatest',
                'categoryPostSpecial', 'bannersRight'));
        } else {
            $cate = PostCategory::findBySlug($parent_slug);
            if (!$cate) {
                $cate = CategorySpecial::findBySlug($parent_slug);
            }
            // bài viết mới nhất
            $postCateSecond = $cate->posts()->paginate(1);

            return view($this->view . '.news', compact('cate', 'postCateSecond', 'categoryPostSpecial',
                'categories', 'postsLatest', 'bannersRight'));
        }
    }

    /**
     * trang chi tiết tin tức
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPost($slug)
    {
        $categories = PostCategory::query()
            ->where(['parent_id' => 0, 'show_home_page' => 1])
            ->orderBy('order_number')->get();

        // bài viết mới nhất
        $postsLatest = Post::query()->latest()->take(5)->get();

        // lấy danh mục đặc biệt
        $categoryPostSpecial = CategorySpecial::query()->with('posts')
            ->where(['type' => 20, 'show_home_page' => 1])
            ->orderBy('order_number')->get();

        $categoryPostSpecial = $categoryPostSpecial->map(function ($cate) {
            $cate->posts = $cate->posts->take(5);
            return $cate;
        });

        $post = Post::findBySlug($slug);

        $relate_posts = $post->getRelate();
        $cate = $post->category;

        // cho mobile
        $bannersRight = Banner::query()->where(['position' => 'right'])->latest()->take(3)->get();

        return view($this->view.'.news_detail', compact('post', 'cate',
            'relate_posts', 'categories', 'categoryPostSpecial', 'postsLatest', 'bannersRight'));
    }

    public function showContact()
    {
        return view('front.contact');
    }

    public function postSupport(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'name' => 'required|max:255',
                'mobile' => 'required|regex:/^(0)[0-9]{9,11}$/',
                'address' => 'nullable|max:255',
                'content' => 'required',
            ]
        );
        $json = new stdClass();

        if ($validate->fails()) {
            $json->success = false;
            $json->errors = $validate->errors();
            $json->message = "Thao tác thất bại!";
            return Response::json($json);
        }

        DB::beginTransaction();
        try {
            $data['name'] = $request->name;
            $data['mobile'] = $request->mobile;
            $data['address'] = $request->address;
            $data['content'] = $request->content;
            // send email
            $config = Config::where('id', 1)->first();

            Mail::send('front.support_mail', ['data' => $data], function ($msg) use ($data, $config) {
                $msg->from('namdangit@gmail.com', $config->site_title);
                $msg->to($config->email, 'Yêu cầu hỗ trợ')->subject('Yêu cầu hỗ trợ từ website ' . $config->site_title . ' !');
            });

            DB::commit();
            $json->success = true;
            $json->message = "Thao tác thành công!";
            $json->data = $object;
            return Response::json($json);
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function posts()
    {
        $categories = PostCategory::query()
            ->where(['parent_id' => 0, 'show_home_page' => 1])
            ->orderBy('order_number')->get();

        // hàng list bên dưới lấy tất cả bài viết
        $postCateSecond = Post::query()->paginate(1);

        // bài viết mới nhất
        $postsLatest = Post::query()->latest()->take(5)->get();

        // lấy danh mục đặc biệt
        $categoryPostSpecial = CategorySpecial::query()->with('posts')
            ->where(['type' => 20, 'show_home_page' => 1])
            ->orderBy('order_number')->get();

        $categoryPostSpecial = $categoryPostSpecial->map(function ($cate) {
            $cate->posts = $cate->posts->take(5);
            return $cate;
        });

        // cho mobile
        $bannersRight = Banner::query()->where(['position' => 'right'])->latest()->take(3)->get();

        return view($this->view . '.news', compact('postCateSecond', 'categories',
            'postsLatest', 'categoryPostSpecial', 'bannersRight'));
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $products = Product::query()
            ->where('name', 'like', '%' . $keyword . '%')
            ->orWhereHas('manufacturer', function ($q) use ($keyword) {
                $q->where('manufacturers.name', 'like', '%' . $keyword . '%');
            })->latest()->get();

        return view($this->view . '.search', compact('keyword', 'products'));

    }

    public function introduction() {
        // cho mobile
        $bannersRight = Banner::query()->where(['position' => 'right'])->latest()->take(3)->get();

        $config = Config::query()->first();
        return view($this->view.'.about', compact('config', 'bannersRight'));
    }

    public function policy(Request $request, $id) {
        // cho mobile
        $bannersRight = Banner::query()->where(['position' => 'right'])->latest()->take(3)->get();
        $policy = Policy::query()->where('status', true)->find($id);

        return view($this->view.'.policy', compact('policy', 'bannersRight'));
    }
}
