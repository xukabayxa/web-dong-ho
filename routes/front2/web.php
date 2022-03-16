<?php

Route::group(['namespace' => 'Front'], function () {
    Route::get('/gio-hang','CartController@index')->name('cart');
    Route::post('/{productId}/add-product-to-cart','CartController@addItem')->name('cart.add.item');
    Route::get('/remove-product-to-cart','CartController@removeItem')->name('cart.remove.item');
    Route::get('/update-cart','CartController@updateItem')->name('cart.update.item');
    Route::post('/gio-hang/checkout','CartController@checkout')->name('cart.checkout');
    Route::get('/dat-hang-thanh-cong','CartController@checkoutSuccess')->name('cart.checkout.success');

    Route::get('/','FrontController@index')->name('homePage');
    Route::get('/danh-muc/{parent_slug}/{code_manufacturer?}','FrontController@getCategory')->name('Category');
    Route::get('/load-more/product','FrontController@loadMoreProduct')->name('product.loadmore');
    Route::get('/filter-product-category-v2','FrontController@filterProductCategoryV2')->name('product.filter.v2');
    Route::get('/san-pham/{slug}','FrontController@getProduct')->name('Product');
    Route::get('/tin-tuc/{parent_slug}/{slug?}','FrontController@getPostCategory')->name('postCategory');
    Route::get('/trang-ho-tro-khach-hang','FrontController@showContact')->name('contact');
    Route::post('/gui-ho-tro/send','FrontController@postSupport')->name('postSupport');
    Route::get('/tin-tuc','FrontController@posts')->name('Post');
    Route::get('/chinh-sach/{id}','FrontController@policy')->name('policy');
    Route::get('/tim-kiem','FrontController@search')->name('Search');
    Route::get('/gioi-thieu','FrontController@introduction')->name('About');
    Route::get('/{slug}','FrontController@getPost')->name('Post.detail');
});



