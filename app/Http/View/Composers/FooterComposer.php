<?php

namespace App\Http\View\Composers;

use App\Model\Admin\Category;
use App\Model\Admin\Config;
use App\Model\Admin\Policy;
use App\Model\Admin\PostCategory;
use App\Model\Admin\Store;
use Illuminate\View\View;

class FooterComposer
{
    /**
     * Compose Settings Menu
     * @param View $view
     */
    public function compose(View $view)
    {
        $config = Config::query()->get()->first();
        $policies = Policy::query()->where('status', true)->latest()->get();

        $productCategories = Category::query()->with(['childs', 'manufacturers'])
            ->where(['type' => 1, 'parent_id' => 0, 'show_home_page' => 1])
            ->orderBy('sort_order')
            ->get();
        $postCategories = PostCategory::query()->where(['parent_id' => 0, 'show_home_page' => 1])->latest()->get();

        $view->with(['config' => $config, 'policies' => $policies, 'product_categories' => $productCategories, 'post_categories' => $postCategories]);
    }
}
