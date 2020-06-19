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

Route::get('/', 'FrontendController@welcome')->name('home');
// Route::get('/{name}', 'FrontendController@welcomename');

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
Route::get('/wishlist.html', 'FrontendController@wishlist');

// chi tiet san pham

Route::get('/productsingle{id}', 'FrontendController@singleId')->name('prdsingle.id');
Route::get('/productsingle', 'FrontendController@single')->name('prdsingle');

Route::post('subscribe', 'FrontendController@subscribe');
Route::get('/about.html', 'FrontendController@about');
Route::post('subscribe', 'FrontendController@subscribe');
Route::get('/about.html', 'FrontendController@about')->name('about');
Route::get('/contact.html', 'FrontendController@contact')->name('contactUs');

// an chưa sử lý, chỉ truyền được tham số
Route::get('/loadPR/{id}', function ($id) {
    $dataPrCat = DB::table('products')->where('cat_id', $id)->paginate(4);
    return view('wishlist', compact('dataPrCat'));
})->name('loadPR.loadWhishList');
Route::get('/loadDeatilProduct', 'FrontendController@loadDeatilProduct')->name('product.detail');

Route::get('/loadProduct', 'FrontendController@loadProducOfCate')->name('lstProductOfCate');

//Phan gio hang
Route::get('/cart.html', 'FrontendController@cart');
Route::get('add/{id}', 'FrontendController@getAddCart');
Route::get('delete/{id}', 'FrontendController@getDeleteCart');
Route::get('update','FrontendController@getUpdateCart');

//Phan thanh toan

Route::get('/checkout.html','FrontendController@getCheckOut');
Route::post('checkout','FrontendController@postCheckOut');



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

// login logout
Route::get('/login', 'LoginController@login');
Route::post('login', 'LoginController@postLogin');
Route::get('logout', 'LoginController@logout');
// register
Route::get('/register', 'LoginController@register');
Route::post('register', 'LoginController@postRegister');
