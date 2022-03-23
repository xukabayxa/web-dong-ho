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
        $config = Config::query()->get()->first();
        $policies = Policy::query()->where('status', true)->latest()->get();

        $view->with(['config' => $config, 'policies' => $policies]);
    }
}
