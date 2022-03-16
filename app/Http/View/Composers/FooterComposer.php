<?php

namespace App\Http\View\Composers;

use App\Model\Admin\Category;
use App\Model\Admin\Config;
use App\Model\Admin\Policy;
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
        $stores = Store::query()->latest()->get()->groupBy(function ($item) {
            return $item->province->name;
        });
        $config = Config::query()->get()->first();
        $policies = Policy::query()->where('status', true)->latest()->get();

        $view->with(['stores' => $stores, 'config' => $config, 'policies' => $policies]);
    }
}
