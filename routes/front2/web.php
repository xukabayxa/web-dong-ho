<?php

Route::group(['namespace' => 'Front'], function () {
    Route::get('/gio-hang','CartController@index')->name('cart');
    Route::post('/{productId}/add-product-to-cart','CartController@addItem')->name('cart.add.item');
    Route::get('/remove-product-to-cart','CartController@removeItem')->name('cart.remove.item');
    Route::get('/update-cart','CartController@updateItem')->name('cart.update.item');
    Route::get('/thanh-toan','CartController@checkout')->name('cart.get.checkout');
    Route::post('/checkout','CartController@checkoutSubmit')->name('cart.post.checkout');
    Route::get('/dat-hang-thanh-cong','CartController@checkoutSuccess')->name('cart.checkout.success');

    Route::get('/','FrontController@index')->name('front.home_page');
    Route::get('/shop/{categorySlug?}','FrontController@getCategory')->name('front.category_product');
    Route::get('/product/{id}/getData','FrontController@getDataProduct')->name('front.product.getData');
    Route::get('/san-pham/{slug}','FrontController@detailProduct')->name('front.product.detail');
    Route::get('/tin-tuc/{slug?}/{postSlug?}','FrontController@getPostCategory')->name('front.news');
    Route::get('/bai-viet/{slug}','FrontController@getPostCategory')->name('front.news.detail');


    Route::get('/lien-he','FrontController@contact')->name('front.contact');
    Route::post('/send-contact','FrontController@sendContact')->name('send.contact');
    Route::get('/tim-kiem','FrontController@search')->name('front.search');
    Route::get('/gioi-thieu','FrontController@introduction')->name('front.about');
//


//
//    Route::get('/trang-ho-tro-khach-hang','FrontController@showContact')->name('contact');
//    Route::post('/gui-ho-tro/send','FrontController@postSupport')->name('postSupport');
//    Route::get('/chinh-sach/{id}','FrontController@policy')->name('policy');
//    Route::get('/tim-kiem','FrontController@search')->name('Search');
//    Route::get('/{slug}','FrontController@getPost')->name('Post.detail');
});



