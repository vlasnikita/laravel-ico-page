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

Route::group(array('middleware' => ['web', 'lang']), function () {

    Route::auth();
    Route::resource('/', 'HomeController');
    Route::get('/profile', 'ProfileController@index');
    Route::post('/save_profile', 'ProfileController@save_profile');
    Route::post('/go_blockchain', 'ProfileController@go_blockchain');

    Route::get('/blockchain_ipn', 'HomeController@blockchain_ipn');
    Route::post('/blockchain_ipn', 'HomeController@blockchain_ipn');

    Route::post('/profile/password_reset', 'ProfileController@passwordReset');

    Route::get('logout', '\Backpack\Base\app\Http\Controllers\Auth\LoginController@logout');

//    Route::get('/google/redirect', 'SocialAuthController@google_redirect');
//    Route::get('/facebook/redirect', 'SocialAuthController@facebook_redirect');
//    Route::get('/google/callback', 'SocialAuthController@google_callback');
//    Route::get('/facebook/callback', 'SocialAuthController@facebook_callback');


});

Route::group(['prefix' => config('backpack.base.route_prefix', 'admin'), 'middleware' => ['web', 'role:admin']], function () {

    if (config('backpack.base.setup_dashboard_routes')) {
        Route::get('dashboard', '\Backpack\Base\app\Http\Controllers\AdminController@dashboard');
        Route::get('/', '\Backpack\Base\app\Http\Controllers\AdminController@redirect');
    }

    Route::resource('setting', '\Backpack\Settings\app\Http\Controllers\SettingCrudController');

    Route::get('language/texts/{lang?}/{file?}', '\Backpack\LangFileManager\app\Http\Controllers\LanguageCrudController@showTexts');
    Route::post('language/texts/{lang}/{file}', '\Backpack\LangFileManager\app\Http\Controllers\LanguageCrudController@updateTexts');
    Route::resource('language', '\Backpack\LangFileManager\app\Http\Controllers\LanguageCrudController');

    Route::get('log', '\Backpack\LogManager\app\Http\Controllers\LogController@index');
    Route::get('log/preview/{file_name}', '\Backpack\LogManager\app\Http\Controllers\LogController@preview');
    Route::get('log/download/{file_name}', '\Backpack\LogManager\app\Http\Controllers\LogController@download');
    Route::delete('log/delete/{file_name}', '\Backpack\LogManager\app\Http\Controllers\LogController@delete');

    CRUD::resource('permission', '\Backpack\PermissionManager\app\Http\Controllers\PermissionCrudController');
    CRUD::resource('role', '\Backpack\PermissionManager\app\Http\Controllers\RoleCrudController');
//    CRUD::resource('user', 'UserCrudController');
    CRUD::resource('user', '\Backpack\PermissionManager\app\Http\Controllers\UserCrudController');

    CRUD::resource('page', '\Backpack\PageManager\app\Http\Controllers\Admin\PageCrudController');

    Route::get('elfinder', '\Barryvdh\Elfinder\ElfinderController@showIndex');
});
