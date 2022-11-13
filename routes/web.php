<?php

use App\Http\Controllers\API\GoogleController;
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



Route::get('/', [\App\Http\Controllers\HControllerr::class, 'index'])->name('homepage');

// Shop
Route::get('/shop/{slug?}', [\App\Http\Controllers\SController::class, 'index'])->name('shop.index');
Route::get('/shop/tag/{slug?}', [\App\Http\Controllers\SController::class, 'tag'])->name('shop.tag');



// Product
Route::get('/product/{product:slug?}', [\App\Http\Controllers\PController::class, 'show'])->name('product.show');

// Cart
Route::get('/cart/{product:slug?}', [\App\Http\Controllers\CartController::class, 'store'])->name('cart.index');
Route::get('/carts', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.CartPage');
Route::resource('/carts', \App\Http\Controllers\CartController::class);
Route::get('cart/inc/{carts:id?}',[\App\Http\Controllers\CartController::class, 'inc'])->name('cart.inc');
Route::get('cart/dec/{carts:id?}',[\App\Http\Controllers\CartController::class, 'dec'])->name('cart.dec');



Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin',  'as' => 'admin.' ], function (){

    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/products', [\App\Http\Controllers\Admin\HController::class, 'get_products']);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\Tb_productcateController::class);
    Route::post('categories/image', [\App\Http\Controllers\Admin\Tb_productcateController::class, 'storeImage'])->name('categories.storeImage');

    // product
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::post('products/image', [\App\Http\Controllers\Admin\ProductController::class, 'storeImage'])->name('products.storeImage');

    // Tag
    Route::resource('tags', \App\Http\Controllers\Admin\TagController::class);

});


Route::get('/check', [\App\Http\Controllers\CEController::class, 'check'])->name('check.show');
Route::post('place/order', [\App\Http\Controllers\OrderController::class, 'storeOrder'])->name('place-order');
Route::get('order/success', [\App\Http\Controllers\OrderController::class, 'orderSuccess'])->name('Order.orderSuccess');

Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.show');
Route::get('/about/detail', [\App\Http\Controllers\AboutController::class, 'detail'])->name('detail');

Route::get('/login', [\App\Http\Controllers\ControllerLogin::class, 'index'])->name('loginPage.login');
Route::get('/register', [\App\Http\Controllers\ControllerLogin::class, 'register'])->name('loginPage.register');

Route::get('/register', [\App\Http\Controllers\ControllerLogin::class, 'register'])->name('loginPage.register');

Route::get('admin/studenttb', [\App\Http\Controllers\Admin\ControllerStudent::class, 'student'])->name('student');
Route::get('admin/classtb', [\App\Http\Controllers\Admin\ControllerClass::class, 'class'])->name('class');

Route::get('admin/classcreate', [\App\Http\Controllers\Admin\ControllerClassc::class, 'cr'])->name('createclass');
Route::get('admin/studentcreate', [\App\Http\Controllers\Admin\ControllerClassr::class, 'cs'])->name('createstudent');


Auth::routes();

Route::get('/homes', [App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('/home', [App\Http\Controllers\ProfileController::class, 'index'])->name('index');


// API Google
Route::controller(GoogleController::class)->group(function(){
    Route::get('/auth/{provider}', [GoogleController::class, 'redirectToProvider']);
    Route::get('/auth/{provider}/callback', [GoogleController::class, 'handleProvideCallback']);
});


