<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

Route::get('/logins', 'LoginController@login')->name('login');
Route::get('/', 'FrontendController@welcome')->name('home');
// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/vegetables.html', 'FrontendController@vegetables');

Route::get('/shop.html/{id?}', 'FrontendController@shop')->name('index.shop');
Route::get('/vegetables.html', 'FrontendController@vegetables');

Route::get('/shop.html', 'FrontendController@shop')->name('shop');
//an lam
Route::get('/shop{id}', 'FrontendController@shopId')->name('shop.id');

// end an lam

Route::get('/fruits.html', 'FrontendController@fruits');
Route::get('/juice.html', 'FrontendController@juice')->name('juce');
Route::get('/dried.html', 'FrontendController@dried');
Route::get('/wishlist.html', 'FrontendController@wishlist')->name('wishlist');

// chi tiet san pham

Route::get('/productsingle{id}', 'FrontendController@singleId')->name('prdsingle.id');
Route::get('/productsingle', 'FrontendController@single')->name('prdsingle');

Route::get('/about.html', 'FrontendController@about');
Route::post('subscribe', 'FrontendController@subscribe');
Route::get('/about.html', 'FrontendController@about')->name('about');
Route::get('/contact.html', 'FrontendController@contact')->name('contactUs');


Route::get('/loadDeatilProduct', 'FrontendController@loadDeatilProduct')->name('product.detail');

Route::get('/loadProduct', 'FrontendController@loadProducOfCate')->name('lstProductOfCate');

//Phan gio hang
Route::get('/cart.html', 'FrontendController@cart');
Route::get('add/{id}', 'FrontendController@getAddCart');
Route::get('delete/{id}', 'FrontendController@getDeleteCart');
Route::get('update', 'FrontendController@getUpdateCart');

//Phan thanh toan

Route::get('/checkout.html', 'FrontendController@getCheckOut');
Route::post('checkout', 'FrontendController@postCheckOut');
Route::get('/complete.html', 'FrontendController@complete');



Auth::routes();
date_default_timezone_set(DateTimeZone::listIdentifiers(DateTimeZone::ASIA)[27]);

// Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/cate_manage', 'CategoryController@index');


// Route::resource('/cate_manage', function () {

//     return view('category.list');

// });

//Route::get('/cate_manage', 'CategoryController@index');
/*Route::middleware(['team'])->group(function () {
    Route::prefix('api')->group(function () {
        Route::get('/cate_manage', 'CategoryController@index');
    });
});*/

// chuc nang cua nhan vien
Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('cate_manage', 'CategoryController');

        //Sản phẩm
        Route::resource('product_manage', 'ProductController');
        Route::post('edit', 'ProductController@saveedit')->name('admin.pro.edit');
        Route::post('delete', 'ProductController@destroy')->name('admin.pro.destroy');
        Route::post('savepr', 'ProductController@store')->name('admin.pro.store');
        Route::get('searhch', 'ProductController@search')->name('product.search');

        //Kết thúc route sp

        Route::resource('user_manage', 'UserController');
        Route::resource('customer_manage', 'CustomerController');
        Route::resource('comment_manage', 'CommentController');
        Route::get('cate_manage.search', 'CategoryController@search')->name('comment_manage.search');

        //Quản lý đơn hàng
        Route::resource('order_manage', 'OrderController');
        Route::get('detail', 'OrderController@LoadDetai')->name('orderDetail');
        Route::post('saveEdit', 'OrderController@saveEditBill')->name('saveEdit');
        Route::get('exportExcel', 'OrderController@ExportExcel')->name('exportExcelBill');
        Route::group(['prefix' => 'admin'], function () {
        });
    });
});

// CHuc nang cua admin
Route::middleware(['auth', 'team'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('order_manage', 'OrderController');
        Route::resource('employee_manage', 'EmployeeController');
    });
});

// login/logout
Route::get('/dangnhap', 'LoginOutController@login')->name('index.login');
Route::post('/postdangnhap', 'LoginOutController@postLogin')->name('index.postLogin');

Route::get('/logout', 'LoginOutController@logout')->name('index.logout');
Route::post('/logout', 'LoginOutController@postlogout')->name('index.postlogout');

Route::get('/register', 'LoginOutController@register')->name('register');
Route::post('/register', 'LoginOutController@postRegister')->name('postRegister');
