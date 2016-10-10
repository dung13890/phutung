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

Route::group(['middlewareGroups' => ['web']], function () {

	Route::get('image/{path}', ['as' => 'image', 'uses' => 'Backend\DashboardController@getReponseImage'])->where('path', '(.*?)');
	Route::get('file/{path}', ['as' => 'file', 'uses' => 'Backend\DashboardController@getReponseFile'])->where('path', '(.*?)');
	
	Route::group(['namespace' => 'Auth'], function () {
		Route::group(['namespace' => 'Backend'], function () {
			Route::get('login', 'AuthController@getLogin');
            Route::post('login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);
            Route::get('logout', 'AuthController@logout');
		});

	});

	Route::group(['prefix' => '/', 'namespace' => 'Frontend'], function () {
		Route::get('/', ['as'=>'home.index', 'uses'=>'HomeController@index']);
		Route::get('lien-he', ['as' => 'home.contact', 'uses' => 'HomeController@contact']);
		Route::get('tai-lieu-tham-khao', ['as' => 'home.file', 'uses' => 'HomeController@getListFile']);
		Route::get('tim-kiem', ['as' => 'home.search', 'uses' => 'HomeController@search']);
		Route::POST('contact', ['as' => 'home.post.contact', 'uses' => 'HomeController@postContact']);
        Route::get('category/{slug}', ['as' => 'category.show', 'uses' => 'CategoryController@show']);
        Route::get('page/{slug}', ['as' => 'page.show', 'uses' => 'PageController@show']);
        Route::get('product/{slug}', ['as' => 'product.show', 'uses' => 'ProductController@show']);
        Route::get('post/{slug}', ['as' => 'post.show', 'uses' => 'PostController@show']);
        Route::get('lang/{locale}', ['as' => 'home.locale', 'uses' => 'HomeController@locale']);
        
	});

	Route::group(['prefix' => '/backend', 'namespace' => 'Backend','middleware' => ['auth']], function () {
		Route::get('/', 'DashboardController@index');
		Route::get('lang/{locale}', ['as' => 'backend.locale', 'uses' => 'DashboardController@locale']);
		Route::post('summernote/image', ['as' => 'backend.summernote.image', 'uses' => 'DashboardController@summernoteImage']);
		Route::PATCH('notification/{notification}', array('as'=>'backend.notification.read', 'uses'=>'DashboardController@readNotification'));

		Route::get('user/data/role/{role}', ['as'=>'backend.user.data.role', 'uses'=>'UserController@getDataWithRole']);
		Route::get('user/role/{role}', ['as'=>'backend.user.role', 'uses'=>'UserController@role']);
		Route::get('user/data', ['as'=>'backend.user.data', 'uses'=>'UserController@getData']);
		Route::resource('user', 'UserController');

		Route::get('role/data', ['as'=>'backend.role.data', 'uses'=>'RoleController@getData']);
		Route::resource('role', 'RoleController');

		Route::get('profile/log', ['as'=>'backend.profile.log', 'uses'=>'ProfileController@getLog']);
		Route::get('profile', ['as'=>'backend.profile', 'uses'=>'ProfileController@userShow']);
		Route::PATCH('profile/update', ['as'=>'backend.profile.update', 'uses'=>'ProfileController@userUpdate']);

		Route::PATCH('category/design/{category}', ['as'=>'backend.category.design','uses'=>'CategoryController@storeDesign']);
		Route::DELETE('category/design/delete/{design}', ['as'=>'backend.category.design.destroy','uses'=>'CategoryController@deleteDesign']);
		Route::get('category/type/{type}', ['as'=>'backend.category.type', 'uses'=>'CategoryController@withType']);
		Route::resource('category', 'CategoryController');

		Route::get('post/data/category/{category}', ['as'=>'backend.post.data.category', 'uses'=>'PostController@getDataWithCategory']);
		Route::get('post/category/{category}', ['as'=>'backend.post.category', 'uses'=>'PostController@category']);
		Route::get('post/data', ['as'=>'backend.post.data', 'uses'=>'PostController@getData']);
		Route::get('post/tags', ['as'=>'backend.post.tags', 'uses'=>'PostController@getTags']);
		Route::resource('post', 'PostController');

		Route::get('page/data', ['as'=>'backend.page.data', 'uses'=>'PageController@getData']);
		Route::get('page/tags', ['as'=>'backend.page.tags', 'uses'=>'PageController@getTags']);
		Route::resource('page', 'PageController');

		Route::get('position/data', ['as'=>'backend.position.data', 'uses'=>'PositionController@getData']);
		Route::resource('position', 'PositionController');

		Route::get('contact/data', ['as'=>'backend.contact.data', 'uses'=>'ContactController@getData']);
		Route::resource('contact', 'ContactController', ['only' => ['index', 'edit', 'show', 'destroy']]);

		Route::get('product/data/type/{type}', ['as'=>'backend.product.data.type', 'uses'=>'ProductController@getDataWithType']);
		Route::get('product/type/{type}', ['as'=>'backend.product.type', 'uses'=>'ProductController@type']);
		Route::get('product/data/category/{category}', ['as'=>'backend.product.data.category', 'uses'=>'ProductController@getDataWithCategory']);
		Route::get('product/category/{category}', ['as'=>'backend.product.category', 'uses'=>'ProductController@category']);
		Route::get('product/tags', ['as'=>'backend.product.tags', 'uses'=>'ProductController@getTags']);
		Route::get('product/create/{type}', ['as'=>'backend.product.create.type', 'uses'=>'ProductController@createWithType']);
		Route::resource('product', 'ProductController', [ 'only' => ['show', 'store', 'edit','update', 'destroy']]);

		Route::resource('property', 'PropertyController', ['only' => [
                'index','edit','store','update','destroy'
            ]
        ]);

        Route::resource('config', 'ConfigController', ['only' => ['index', 'store']]);

        Route::get('slide/data', ['as'=>'backend.slide.data', 'uses'=>'SlideController@getData']);
		Route::resource('slide', 'SlideController');

		Route::get('file/data', ['as'=>'backend.file.data', 'uses'=>'FileController@getData']);
		Route::resource('file', 'FileController');

		Route::get('provider/data', ['as'=>'backend.provider.data', 'uses'=>'ProviderController@getData']);
		Route::resource('provider', 'ProviderController');

        Route::resource('image', 'ImageController', ['only' => [
                'index','store','update','destroy'
            ]
        ]);

        Route::POST('menu/serialize', ['as'=>'backend.menu.serialize','uses'=>'MenuController@serialize']);
        Route::resource('menu', 'MenuController', ['only' => ['index','store','update','destroy']]);
	});
});

