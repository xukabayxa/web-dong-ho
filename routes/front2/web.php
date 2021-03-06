<?php

Route::group(['namespace' => 'Front'], function () {
    Route::get('/gio-hang','CartController@index')->name('cart');
    Route::post('/{productId}/add-product-to-cart','CartController@addItem')->name('cart.add.item');
    Route::get('/remove-product-to-cart','CartController@removeItem')->name('cart.remove.item');
    Route::get('/update-cart','CartController@updateItem')->name('cart.update.item');
    Route::get('/thanh-toan','CartController@checkout')->name('cart.get.checkout');
    Route::post('/checkout','CartController@checkoutSubmit')->name('cart.post.checkout');
    Route::get('/dat-hang-thanh-cong/{orderCode}','CartController@checkoutSuccess')->name('cart.checkout.success');
    Route::post('/{productId}/add-to-wishlist','CartController@addToWishList')->name('cart.add.wishlist');
    Route::get('/yeu-thich','CartController@wishList')->name('cart.wishlist');

    Route::get('/','FrontController@index')->name('front.home_page');
    Route::get('/shop/{categorySlug?}','FrontController@getCategory')->name('front.category_product');
    Route::get('/load-more-products','FrontController@loadMoreProduct')->name('front.loadmore.products');
    Route::get('/product/{id}/getData','FrontController@getDataProduct')->name('front.product.getData');
    Route::get('/san-pham/{slug}','FrontController@detailProduct')->name('front.product.detail');
    Route::get('/tin-tuc/{slug?}/{postSlug?}','FrontController@getPostCategory')->name('front.news');
    Route::get('/bai-viet/{slug}','FrontController@getPostCategory')->name('front.news.detail');


    Route::get('/lien-he','FrontController@contact')->name('front.contact');
    Route::post('/send-contact','FrontController@sendContact')->name('send.contact');
    Route::get('/tim-kiem','FrontController@search')->name('front.search');
    Route::get('/suggest-result-search','FrontController@getSuggestSearchResult')->name('front.get.suggest.search');
    Route::get('/gioi-thieu','FrontController@introduction')->name('front.about');

});



