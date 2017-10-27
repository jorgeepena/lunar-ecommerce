<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [
	'uses' => '\Lunar\Http\Controllers\CatalogController@index',
	'as' => 'index',
]);

Route::get('/catalog', [
	'uses' => '\Lunar\Http\Controllers\CatalogController@greatdetail',
	'as' => 'great-detail',
]);

Route::get('/search', [
    'uses' => '\Lunar\Http\Controllers\SearchController@query',
    'as' => 'search.query',
]);

/*
Route::get('/catalog/{id}', [
    'uses' => '\Lunar\Http\Controllers\CatalogController@detail',
    'as' => 'product.detail',
]);
*/

Route::get('/catalog/{slug}', [
	'uses' => '\Lunar\Http\Controllers\CatalogController@detail',
	'as' => 'product.detail',
])->where('slug', '[\w\d\-\_]+');


/* Front-End Client */

Auth::routes();


Route::group(['middleware' => 'auth'], function(){

	/* Profile Overview */

	Route::get('/profile', [
		'uses' => '\Lunar\Http\Controllers\UserController@profile',
		'as' => 'profile.index',
	]);

	/* Profile Info¨*/

	Route::get('/profile/account-info', [
		'uses' => '\Lunar\Http\Controllers\UserController@editProfile',
		'as' => 'profile.edit',
	]);

	Route::put('/profile/account-info/{id}', [
		'uses' => '\Lunar\Http\Controllers\UserController@updateProfile',
		'as' => 'profile.update',
	]);

	/* Profile Image */

	Route::get('/profile/account-image', [
		'uses' => '\Lunar\Http\Controllers\UserController@editImage',
		'as' => 'profile.image',
	]);

	Route::put('/profile/account-image/{id}', [
		'uses' => '\Lunar\Http\Controllers\UserController@updateImage',
		'as' => 'profile.image.update',
	]);

	/* Orders Summary */

	Route::get('/profile/orders', [
		'uses' => '\Lunar\Http\Controllers\UserController@orders',
		'as' => 'profile.orders',
	]);

	/* Address Funcionality */

	Route::get('/profile/addresses', [
		'uses' => '\Lunar\Http\Controllers\UserController@addresses',
		'as' => 'profile.address.index',
	]);

	Route::get('/profile/addresses/new', [
		'uses' => '\Lunar\Http\Controllers\UserController@createAddress',
		'as' => 'profile.address.create',
	]);

	Route::post('/profile/addresses/new', [
		'uses' => '\Lunar\Http\Controllers\UserController@storeAddress',
		'as' => 'profile.address.store',
	]);


	/* Wishlist */

	Route::get('/profile/wishlist', [
		'uses' => '\Lunar\Http\Controllers\WishlistController@wishlist',
		'as' => 'profile.wishlist',
	]);

	Route::get('/wishlist/add/{id}', [
		'uses' => '\Lunar\Http\Controllers\WishlistController@add',
		'as' => 'wishlist.add',
	]);

	Route::get('/wishlist/remove/{id}', [
		'uses' => '\Lunar\Http\Controllers\WishlistController@destroy',
		'as' => 'wishlist.remove',
	]);


	/* Checkout Process */
	Route::get('/checkout',[
		'uses' => 'CatalogController@checkout',
		'as' => 'checkout',
	]);

	Route::post('/checkout',[
		'uses' => 'CatalogController@postCheckout',
		'as' => 'checkout',
	]);


});

/* Shopping Cart */

Route::get('/cart/{id}',[
	'uses' => 'CatalogController@addCart',
	'as' => 'add-cart',
]);

Route::get('/cart',[
	'uses' => 'CatalogController@cart',
	'as' => 'cart',
]);

Route::get('/substract/{id}',[
	'uses' => 'CatalogController@substractOne',
	'as' => 'cart.substract',
]);

Route::get('/add/{id}',[
	'uses' => 'CatalogController@addMore',
	'as' => 'cart.add-more',
]);

Route::get('/delete/{id}',[
	'uses' => 'CatalogController@deleteItem',
	'as' => 'cart.delete',
]);

/* Admin Dashboard */

Route::group(['middleware' => 'guest:admin'], function(){
	Route::get('/admin/login', [
		'uses' => '\Lunar\Http\Controllers\Admin\AuthController@login',
		'as' => 'admin.login',
	]);

	Route::post('/admin/login', [
		'uses' => '\Lunar\Http\Controllers\Admin\AuthController@postLogin',
		'as' => 'admin.login'
	]);	


});

/* MIDDLEWARE AUTH */

Route::group(['middleware' => 'auth:admin'], function(){

	Route::get('/admin/admin-list', [
		'uses' => '\Lunar\Http\Controllers\Admin\AuthController@adminList',
		'as' => 'admin.index',
	]);

	Route::get('/admin/register-admin', [
		'uses' => '\Lunar\Http\Controllers\Admin\AuthController@register',
		'as' => 'admin.register',
	]);

	Route::post('/admin/register-admin', [
		'uses' => '\Lunar\Http\Controllers\Admin\AuthController@postRegister',
		'as' => 'admin.register',
	]);

	Route::get('/admin/logout', [
		'uses' => '\Lunar\Http\Controllers\Admin\AuthController@logout',
		'as' => 'admin.logout',
	]);
	
	Route::get('/admin', [
		'uses' => '\Lunar\Http\Controllers\Admin\DashboardController@dashboard',
		'as' => 'admin.dashboard'
	]);

	Route::get('/admin/variants', [
		'uses' => '\Lunar\Http\Controllers\Admin\DashboardController@variants',
		'as' => 'admin.variants'
	]);

	Route::get('/admin/search', [
	    'uses' => '\Lunar\Http\Controllers\Admin\SearchController@query',
	    'as' => 'admin.search.query',
	]);

	Route::get('/admin/client-list', [
		'uses' => '\Lunar\Http\Controllers\Admin\ClientController@index',
		'as' => 'client.index'
	]);

	Route::get('/admin/client-list/{id}', [
		'uses' => '\Lunar\Http\Controllers\Admin\ClientController@show',
		'as' => 'client.show'
	]);

	Route::get('/admin/order-list', [
		'uses' => '\Lunar\Http\Controllers\Admin\OrderController@index',
		'as' => 'order.index'
	]);

	Route::get('/admin/order-list/{id}', [
		'uses' => '\Lunar\Http\Controllers\Admin\OrderController@show',
		'as' => 'order.show'
	]);

	Route::get('/admin/order-search', [
	    'uses' => '\Lunar\Http\Controllers\Admin\SearchController@orderQuery',
	    'as' => 'order.search.query',
	]);

	Route::resource('/admin/seo', 'Admin\SEOController');
	Route::resource('/admin/products', 'Admin\ProductController');
	Route::resource('/admin/categories', 'Admin\CategoryController');
	Route::resource('/admin/tags', 'Admin\TagController');

	Route::resource('/admin/clients', 'Admin\ClientController');
	Route::resource('/admin/seo', 'Admin\SEOController');

});