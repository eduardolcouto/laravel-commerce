<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group([],function(){
    Route::get('/', ['as'=>'home','uses'=>'StoreController@index']);
    Route::get('category/{category}', ['as'=>'show.category.products','uses'=>'StoreController@categoryProducts']);
    Route::get('product/{product}', ['as'=>'show.product','uses'=>'StoreController@product']);
    Route::get('tag/{tag}', ['as'=>'show.tag.products','uses'=>'StoreController@tagProducts']);
    
    Route::get('cart', ['as'=>'cart','uses'=>'CartController@index']);
    Route::get('cart/add/{id}', ['as'=>'cart.add','uses'=>'CartController@add']);
    Route::get('cart/remove/{id}', ['as'=>'cart.remove','uses'=>'CartController@remove']);
    Route::get('cart/destroy/{id}', ['as'=>'cart.destroy','uses'=>'CartController@destroy']);

    Route::get('checkout/order-place', ['as'=>'checkout.orderPlace','uses'=>'CheckoutController@place']);

});


Route::patterns(['category'=>'[0-9]+','product'=>'[0-9]+' ]);

Route::group(['prefix'=>'admin', 'middleware'=>['auth','is_admin']],function(){
    Route::group(['prefix'=>'categories'],function(){
        Route::get('/',['as'=>'categories.index', 'uses'=>'AdminCategoriesController@index']);
        Route::get('create',['as'=>'categories.create', 'uses'=>'AdminCategoriesController@create']);
        Route::post('store',['as'=>'categories.store', 'uses'=>'AdminCategoriesController@store']);
        Route::get('edit/{category}',['as'=>'categories.edit', 'uses'=>'AdminCategoriesController@edit']);
        Route::put('update/{category}',['as'=>'categories.update', 'uses'=>'AdminCategoriesController@update']);
        Route::get('destroy/{category}',['as'=>'categories.destroy', 'uses'=>'AdminCategoriesController@destroy']);
    });
    
    Route::group(['prefix'=>'products'],function(){     
        Route::get('/',['as'=>'products.index', 'uses'=>'AdminProductsController@index']);
        Route::get('create',['as'=>'products.create', 'uses'=>'AdminProductsController@create']);
        Route::post('store',['as'=>'products.store', 'uses'=>'AdminProductsController@store']);
        Route::get('edit/{product}',['as'=>'products.edit', 'uses'=>'AdminProductsController@edit']);
        Route::put('update/{product}',['as'=>'products.update', 'uses'=>'AdminProductsController@update']);
        Route::get('destroy/{product}',['as'=>'products.destroy', 'uses'=>'AdminProductsController@destroy']);

        //Images
        Route::get('{product}/images',['as'=>'products.images', 'uses'=>'AdminProductsController@images']);
        Route::get('{product}/images/create',['as'=>'products.images.create', 'uses'=>'AdminProductsController@createImages']);
        Route::post('{product}/images/store',['as'=>'products.images.store', 'uses'=>'AdminProductsController@storeImages']);
        Route::get('{productImage}/images/destroy',['as'=>'products.images.destroy', 'uses'=>'AdminProductsController@destroyImages']);

    });

});


Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    'teste' => 'TesteController'
]);


