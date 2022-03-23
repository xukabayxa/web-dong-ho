<?php

namespace App\Http\View\Composers;

use App\Model\Admin\Category;
use App\Model\Admin\Config;
use App\Model\Admin\Store;
use Illuminate\View\View;

class HeaderComposer
{
    /**
     * Compose Settings Menu
     * @param View $view
     */
    public function compose(View $view)
    {
        $config = Config::query()->get()->first();
        $cartCollection = \Cart::getContent();
        $total = \Cart::getTotal();

        $view->with(['config' => $config, 'cartItems' => $cartCollection, 'totalCart' => $total]);
    }
}
