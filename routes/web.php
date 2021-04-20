<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
//home
Route::get('/', 'Front\HomeController@index');
//blog
Route::get('/blog', 'Front\BlogController@index');
Route::get('/blog-detail/{id}', 'Front\BlogController@detail');
//account
Route::get('/member-login','Front\AccountController@login');
Route::get('/member-register','Front\AccountController@register');
Route::post('/member-register','Front\AccountController@register_form');
Route::post('/member-login','Front\AccountController@login_form');
//login ajax
Route::post('/login-ajax','Front\AccountController@login_ajax');
Route::post('/register-ajax','Front\AccountController@register_ajax');

//rate blog
Route::post('/rate-blog/{id}','Front\BlogController@rate');
//cmt blog
Route::post('/cmt-blog/{id}','Front\BlogController@cmt');
Route::post('/replay-cmt-blog/{id}','Front\BlogController@replay_cmt');
//account
Route::get('account/profile','Front\AccountController@profile');
Route::post('update-profile','Front\AccountController@update_profile');

//product
Route::get('account/myproduct','Front\ProductController@myproduct');
Route::get('account/addproduct','Front\ProductController@addproduct');
Route::post('account/addproduct','Front\ProductController@addproduct_form');
Route::get('account/editproduct/{id}','Front\ProductController@editproduct');
Route::post('account/editproduct/{id}','Front\ProductController@editproduct_form');
Route::get('product-detail/{id}','Front\HomeController@product_detail');
Route::post('/delete-product','Front\ProductController@delete_pro');
Route::post('/search-name', 'Front\ProductController@search');
Route::get('/product', 'Front\ProductController@product');
Route::post('/search-advanced','Front\ProductController@search_advanced' );
Route::get('/slider', 'Front\ProductController@slider');


//cart
Route::post('/add-to-cart/{id}','Front\CartController@add_cart');
Route::get('/cart','Front\CartController@cart');
Route::post('/down-qty','Front\CartController@down');
Route::post('/up-qty','Front\CartController@up');
Route::post('delete-cart','Front\CartController@delete');
Route::get('/checkout','Front\CartController@checkout');

//send mail
Route::post('/pay','Front\MailController@pay');


//auth
Auth::routes();

Route::group(
    [
        'prefix' => 'admin'
    ],
    function () {
        //user
        Route::get('/profile', 'Admin\UserController@view_profile');
        Route::get('/home', 'Admin\DashboardController@index')->name('home');
        Route::get('/logout', 'HomeController@logout');
        Route::post('/update_profile', 'Admin\UserController@update_profile');
        //country
        Route::get('/country', 'Admin\CountryController@country_view');
        Route::get('/add-country', 'Admin\CountryController@add_country');
        Route::post('/add-country-form', 'Admin\CountryController@add_country_form');
        Route::get('/delete-country/{id}', 'Admin\CountryController@delete');
        //blog
        Route::get('/blog', 'Admin\BlogController@blog_view');
        Route::get('/add-blogs', 'Admin\BlogController@blog_add');
        Route::post('/add-blog-form', 'Admin\BlogController@blog_add_form');
        Route::get('/edit-blog/{id}', 'Admin\BlogController@edit_blog');
        Route::post('/edit-blog-form/{id}', 'Admin\BlogController@edit_blog_form');
        //category
        Route::get('/category', 'Admin\CategoryController@category_view');
        Route::get('/add-category', 'Admin\CategoryController@add_category_view');
        Route::post('/add-category', 'Admin\CategoryController@add_category_form');
        Route::get('/delete-category/{id}', 'Admin\CategoryController@delete_category');
        //brand
        Route::get('/brand', 'Admin\BrandController@brand_view');
        Route::get('/add-brand', 'Admin\BrandController@add_brand_view');
        Route::post('/add-brand', 'Admin\BrandController@add_brand_form');
        Route::get('/delete-brand/{id}', 'Admin\BrandController@delete_brand');
    }
);
