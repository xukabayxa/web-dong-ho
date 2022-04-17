<?php

namespace App\Http\Controllers\Front;

use App\Http\Traits\ResponseTrait;
use App\Model\Admin\Banner;
use App\Model\Admin\CategorySpecial;
use App\Model\Admin\Contact;
use App\Model\Admin\Manufacturer;
use App\Model\Admin\Origin;
use App\Model\Admin\Policy;
use App\Model\Admin\PostCategorySpecial;
use App\Model\Admin\Store;
use App\Model\Admin\Tag;
use App\Model\Admin\Tagable;
use App\Services\CategoryService;
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
    use ResponseTrait;

    public $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $banners = Banner::query()->latest()->get();
        $categoriesSpecial = CategorySpecial::query()->with(['products' => function ($q) {
            $q->with('manufacturer');
        }])->where([
            'type' => CategorySpecial::PRODUCT,
            'show_home_page' => 1,
        ])->whereNotNull('order_number')->orderBy('order_number')->get();
        // dd($categoriesSpecial)
        // bài viết mới nhất
        $postsRecent = Post::query()->where('status', 1)->latest()->limit(3)->get();

        return view('site.index', compact('banners', 'categoriesSpecial', 'postsRecent'));
    }

    /**
     * trang danh mục sản phẩm
     * @param Request $request
     */
    public function getCategory_old(Request $request, $categorySlug = null)
    {
        $viewList = $request->get('viewList');
        $viewGrid = $request->get('viewGrid') ?: 'true';
        $sort = $request->get('sort') ?: 'lasted';
        $minPrice = $request->get('minPrice') ?? 0;
        $maxPrice = $request->get('maxPrice') ?? 0;

        $categories = Category::parent()->with('products')->orderBy('sort_order')->get();

        $categories = $categories->map(function ($cate) {
            // áp dụng cho category cha
            $cate->child_categories = $this->categoryService->getChildCategory($cate, 1);
            if ($cate->child_categories->isEmpty()) {
                $cate->products_count = $cate->products()->count();
            } else {
                $cate->products_count = $cate->child_categories->sum('products_count');
            }

            return $cate;
        });

        $tags = Tag::query()->where('type', Tag::TYPE_PRODUCT)->latest()->get();

        $category = null;
        // danh mục con của 1 danh mục
        $child_categories = null;
        if ($categorySlug) {
            $category = Category::findBySlug($categorySlug);
            // nếu có slug, check xem cate này là cha hay con, nếu cate cha thì trả về tất cả sản phẩm của cate con
            // trường hợp là cate cha, có các cate con level 1
            if ($category->childs()->count() > 0 || $category->parent_id == 0) {
                // trường hợp cate cha có cate con
                if ($category->childs()->count() > 0) {
                    $child_categories = $this->categoryService->getChildCategory($category, 1);
                    $product_ids = $child_categories->map(function ($c_cate) {
                        return $c_cate->products->pluck('id')->toArray();
                    })->flatten()->toArray();

                    $products = Product::filter($request, $product_ids)->paginate(9);
                } else {
                    $product_ids = $category->products->pluck('id');
                    $products = Product::filter($request, $product_ids)->paginate(9);
                    $child_categories = collect([$category]);
                }

            } else {
                $parent = $category->getParent();
                $child_categories = $this->categoryService->getChildCategory($parent, 1);
                $product_ids = $category->products->pluck('id');

                $products = Product::filter($request, $product_ids)->paginate(9);
            }
        } else {
            $product_ids = Product::query()->pluck('id')->toArray();
            // trường hợp không có category_slug, lấy toàn bộ các sản phẩm mới nhất
            $products = Product::filter($request, $product_ids)->paginate(9);
        }

        return view('site.product_category', compact('categories', 'products', 'viewGrid', 'viewList',
            'categorySlug', 'sort', 'tags', 'minPrice', 'maxPrice', 'category', 'child_categories'));
    }

    public function getCategory(Request $request, $categorySlug = null)
    {
        $viewList = $request->get('viewList');
        $viewGrid = $request->get('viewGrid') ?: 'true';
        $sort = $request->get('sort') ?: 'lasted';
        $minPrice = $request->get('minPrice') ?? 0;
        $maxPrice = $request->get('maxPrice') ?? 0;

        $categories = Category::parent()->with('products')->orderBy('sort_order')->get();

        $categories = $categories->map(function ($cate) {
            // áp dụng cho category cha
            $cate->child_categories = $this->categoryService->getChildCategory($cate, 1);
            if ($cate->child_categories->isEmpty()) {
                $cate->products_count = $cate->products()->count();
            } else {
                $cate->products_count = $cate->child_categories->sum('products_count');
            }

            return $cate;
        });

        $tags = Tag::query()->where('type', Tag::TYPE_PRODUCT);
        if ($tags->count() > 6) {
            $random = 6;
        } else {
            $random = $tags->count();
        }

        $tags = Tag::query()->where('type', Tag::TYPE_PRODUCT)->get()->random($random);

        $category = null;
        // danh mục con của 1 danh mục
        $child_categories = null;
        if ($categorySlug) {
            $category = Category::findBySlug($categorySlug);
            // nếu có slug, check xem cate này là cha hay con, nếu cate cha thì trả về tất cả sản phẩm của cate con
            // trường hợp là cate cha, có các cate con level 1
            if ($category->childs()->count() > 0 || $category->parent_id == 0) {
                // trường hợp cate cha có cate con
                if ($category->childs()->count() > 0) {
                    $child_categories = $this->categoryService->getChildCategory($category, 1);
                    $product_ids = $child_categories->map(function ($c_cate) {
                        return $c_cate->products->pluck('id')->toArray();
                    })->flatten()->toArray();

                    $products = Product::filter($request, $product_ids)->limit(9)->get();
                } else {
                    $product_ids = $category->products->pluck('id');
                    $products = Product::filter($request, $product_ids)->limit(9)->get();
                    $child_categories = collect([$category]);
                }

            } else {
                $parent = $category->getParent();
                $child_categories = $this->categoryService->getChildCategory($parent, 1);
                $product_ids = $category->products->pluck('id');

                $products = Product::filter($request, $product_ids)->limit(9)->get();
            }
        } else {
            $product_ids = Product::query()->pluck('id')->toArray();
            // trường hợp không có category_slug, lấy toàn bộ các sản phẩm mới nhất
            $products = Product::filter($request, $product_ids)->limit(9)->get();
        }

        $product_ids = $products->pluck('id');

        return view('site.product_category_v2', compact('categories', 'products', 'viewGrid', 'viewList',
            'categorySlug', 'sort', 'tags', 'minPrice', 'maxPrice', 'category', 'child_categories', 'product_ids'));
    }


    public function loadMoreProduct(Request $request)
    {
        if ($request->category_id) {
            $category = Category::find($request->category_id);
            // nếu có slug, check xem cate này là cha hay con, nếu cate cha thì trả về tất cả sản phẩm của cate con
            // trường hợp là cate cha, có các cate con level 1
            if ($category->childs()->count() > 0 || $category->parent_id == 0) {
                // trường hợp cate cha có cate con
                if ($category->childs()->count() > 0) {
                    $child_categories = $this->categoryService->getChildCategory($category, 1);

                    $product_ids = $child_categories->map(function ($c_cate) use ($request) {
                        return $c_cate->products()->pluck('id')->toArray();
                    })->flatten()->toArray();

                    $products = Product::filter($request, array_diff($product_ids, $request->product_ids_load_more))->limit(9)->get();
                } else {
                    $product_ids = $category->products()->pluck('id')->toArray();
                    $products = Product::filter($request, array_diff($product_ids, $request->product_ids_load_more))->limit(9)->get();
                }

            } else {
                $parent = $category->getParent();
                $product_ids = $category->products()->pluck('id')->toArray();
                $products = Product::filter($request, array_diff($product_ids, $request->product_ids_load_more))->limit(9)->get();
            }
        } else {
            $product_ids = Product::query()->pluck('id')->toArray();
            // trường hợp không có category_slug, lấy toàn bộ các sản phẩm mới nhất
            $products = Product::filter($request, array_diff($product_ids, $request->product_ids_load_more))->limit(9)->get();
        }

        $diff = array_diff($product_ids, $request->product_ids_load_more);

        $html_products_grid = '';
        $html_products_list = '';
        foreach ($products as $product) {
            $html_products_grid .= view('site.partials.load_more_product_grid', ['product' => $product])->render();
            $html_products_list .= view('site.partials.load_more_product_list', ['product' => $product])->render();
        }

        $product_ids = $products->pluck('id');
        return response()->json(['success' => true, 'product_render_grid' => $html_products_grid,
            'product_render_list' => $html_products_list,
            'product_ids' => $product_ids, 'diff' => $diff]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDataProduct($id)
    {
        $product = Product::getDataForEdit($id);

        $json = new stdclass();
        $json->success = true;
        $json->data = $product;
        $json->html = view('site.partials.product_detail_thumbnail_modal', ['product' => $product])->render();

        return Response::json($json);
    }

    /**
     * trang chi tiết sản phẩm
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detailProduct($slug)
    {
        $product = Product::findSlug($slug);
        $product_category = $product->category->products()->whereNotIn('id', [$product->id])->orderBy('created_at', 'desc')->get();
        $tag_ids = $product->tags->pluck('id')->toArray();
        $product_tag_ids = Tagable::query()
            ->where('tagable_type', Product::class)
            ->whereIn('tag_id', $tag_ids)->whereNotIn('tagable_id', [$product->id])->pluck('tagable_id')->toArray();
        $product_tag = $product->whereIn('id', $product_tag_ids)->orderBy('created_at', 'desc')->get();

        // sản phẩm liên quan (cùng danh mục, cùng tag)
        $product_related = $product_category->merge($product_tag);

        // sản phẩm giảm giá
        $product_sell = Product::query()->whereNotIn('id', [$product->id])->where('base_price', '>', 0)->latest()->get();

        return view('site.product_detail', compact('product', 'product_related', 'product_sell'));
    }

    /** trang danh mục tin tức
     * @param Request $request
     * @param $parent_slug
     * @param null $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPostCategory(Request $request, $slug = null, $postSlug = null)
    {
        $categories = PostCategory::query()->where(['parent_id' => 0, 'show_home_page' => 1])->latest()->get();
        if (!$postSlug) {
            if ($slug) {
                $category = PostCategory::findBySlug($slug);
                $posts = $category->posts()->paginate(9);
            } else {
                $posts = Post::query()->with(['category'])->where('status', 1)->latest()->paginate(9);
            }
            return view('site.news', compact('categories', 'posts'));
        } else {
            $post = Post::findBySlug($postSlug);
            // bài viết mới nhất
            $postsRecent = Post::query()->where('status', 1)->latest()->limit(3)->get();
            // bài viết liên quan
            $postsRelated = Post::query()->where('cate_id', $post->category->id)
                ->whereNotIn('id', [$post->id])->latest()->limit(3)->get();

            return view('site.news_detail', compact('post', 'postsRecent', 'postsRelated', 'categories'));
        }

    }

    /**
     * trang chi tiết tin tức
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPost($slug)
    {
        $categories = PostCategory::query()->where(['parent_id' => 0, 'show_home_page' => 1])->latest()->get();
        $post = Post::findBySlug($slug);

        // bài viết mới nhất
        $postsRecent = Post::query()->where('status', 1)->latest()->limit(3)->get();
        // bài viết liên quan
        $postsRelated = Post::query()->where('cate_id', $post->category->id)
            ->whereNotIn('id', [$post->id])->latest()->limit(3)->get();

        return view('site.news_detail', compact('post', 'postsRecent', 'postsRelated', 'categories'));
    }

    /**
     * trang kết quả tìm kiếm
     * @param Request $request
     */
    public function search(Request $request, $categorySlug = null)
    {
        $keyword = $request->keyword;
        $category_id = $request->get('category_id', 'all');
        $viewList = $request->get('viewList');
        $viewGrid = $request->get('viewGrid') ?: 'true';
        $sort = $request->get('sort') ?: 'lasted';
        $minPrice = $request->get('minPrice') ?? 0;
        $maxPrice = $request->get('maxPrice') ?? 0;

        $categories = Category::parent()->with('products')->orderBy('sort_order')->get();

        $categories = $categories->map(function ($cate) {
            // áp dụng cho category cha
            $cate->child_categories = $this->categoryService->getChildCategory($cate, 1);
            if ($cate->child_categories->isEmpty()) {
                $cate->products_count = $cate->products()->count();
            } else {
                $cate->products_count = $cate->child_categories->sum('products_count');
            }

            return $cate;
        });

        $tags = Tag::query()->where('type', Tag::TYPE_PRODUCT);
        if ($tags->count() > 6) {
            $random = 6;
        } else {
            $random = $tags->count();
        }

        $tags = Tag::query()->where('type', Tag::TYPE_PRODUCT)->get()->random($random);

        if ($category_id == 'all') {
            $product_ids = Product::query()->pluck('id')->toArray();

            $products = Product::filter($request, $product_ids)->get();

        } else {
            $category = Category::query()->where('id', $request->category_id)->first();

            // trường hợp cate cha có cate con
            if ($category->childs()->count() > 0) {
                $child_categories = $this->categoryService->getChildCategory($category, 1);
                $product_ids = $child_categories->map(function ($c_cate) {
                    return $c_cate->products->pluck('id')->toArray();
                })->flatten()->toArray();

                $products = Product::filter($request, $product_ids)->get();
            } else {
                $product_ids = $category->products->pluck('id');
                $products = Product::filter($request, $product_ids)->get();
            }

        }

        $countProducts = $products->count();
        $products = $products->take(9);
        $product_ids = $products->pluck('id');

        return view('site.search', compact('categories', 'products', 'viewGrid', 'viewList',
            'categorySlug', 'sort', 'tags', 'minPrice', 'maxPrice', 'keyword', 'category_id', 'countProducts', 'product_ids'));
    }

    public function getSuggestSearchResult(Request $request)
    {
        if ($request->category_id == 'all') {
            $product_ids = Product::query()->pluck('id')->toArray();
            $products = Product::filter($request, $product_ids)->limit(4)->get();
        } else {
            $category = Category::query()->where('id', $request->category_id)->first();

            // trường hợp cate cha có cate con
            if ($category->childs()->count() > 0) {
                $child_categories = $this->categoryService->getChildCategory($category, 1);
                $product_ids = $child_categories->map(function ($c_cate) {
                    return $c_cate->products->pluck('id')->toArray();
                })->flatten()->toArray();

                $products = Product::filter($request, $product_ids)->limit(4)->get();
            } else {
                $product_ids = $category->products->pluck('id');
                $products = Product::filter($request, $product_ids)->limit(4)->get();
            }

        }

        return response()->json(['products' => $products]);
    }

    public function introduction()
    {
        $config = Config::query()->first();

        return view('site.about', compact('config'));
    }

    public function policy(Request $request, $id)
    {
        // cho mobile
        $bannersRight = Banner::query()->where(['position' => 'right'])->latest()->limit(3)->get();
        $policy = Policy::query()->where('status', true)->find($id);

        return view($this->view . '.policy', compact('policy', 'bannersRight'));
    }

    public function contact(Request $request)
    {
        $config = Config::query()->get()->first();

        return view('site.contact', compact('config'));
    }

    public function sendContact(Request $request)
    {

        $rule = [
            'user_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|regex:/^(0)[0-9]{9,11}$/',
            'content' => 'required',
        ];

        $translate =
            [
                'user_name.required' => 'Vui lòng nhập họ tên',
                'email.email' => 'Email không hợp lệ',
                'phone_number.required' => 'Vui lòng nhập số điện thoại',
                'phone_number.regex' => 'Số điện thoại không hợp lệ',
                'content.required' => 'Vui lòng nhập nội dung liên hệ',
            ];

        $validate = Validator::make(
            $request->all(),
            $rule,
            $translate
        );

        $json = new stdClass();

        if ($validate->fails()) {
            $json->success = false;
            $json->errors = $validate->errors();
            return Response::json($json);
        }

        $contact = new Contact();
        $contact->user_name = $request->user_name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phone_number;
        $contact->content = $request->content;
        $contact->address = $request->address;

        $contact->save();

        return $this->responseSuccess();
    }
}
