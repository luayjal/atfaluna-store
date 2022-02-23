<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Delivery\DeliveryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\RoleConttroller;
use App\Http\Controllers\Admin\UserConttroller;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\MessagesController;
use App\Http\Controllers\Front\WishListController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\DeliveryAgentsController;
use App\Http\Controllers\Admin\MessagesController as AdminMessagesController;
use App\Http\Controllers\Front\ProductsController as FrontProductsController;

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

Route::get('/dashboard/users', [UserController::class,'index'])->middleware(['auth','type-user:admin,super-admin'])->name('users');
Route::get('/dashboard/edit_user/{id}', [UserController::class,'edit'])->middleware(['auth','type-user:admin,super-admin'])->name('user.edit');
Route::post('/dashboard/update_user/{id}', [UserController::class,'update'])->middleware(['auth','type-user:admin,super-admin'])->name('user.update');
Route::get('/dashboard/delete-user/{id}', [UserController::class,'destroy'])->middleware(['auth','type-user:admin,super-admin'])->name('user.destroy');

Route::get('/dashboard/add-roles/{id}', [RoleConttroller::class,'index'])->middleware(['auth','type-user:admin,super-admin'])->name('user.roles');
Route::post('/dashboard/stor-roles/{id}', [RoleConttroller::class,'store'])->middleware(['auth','type-user:admin,super-admin'])->name('user.store_roles');
Route::get('/dashboard/home', function () {
    return view('dashboard');
})->middleware('auth','type-user:admin,super-admin')->name('dashboard');

Route::prefix('dashboard')->middleware('auth','type-user:admin,super-admin')->as('admin.')->group(function(){



    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

  Route::get('categories/categories-trashed',[CategoriesController::class,'trashCategory'])->name('categories.trash');
  Route::post('categories/restore/{id}',[CategoriesController::class,'restore'])->name('categories.restore');
  Route::get('products/products-trashed',[ProductsController::class,'trashProduct'])->name('products.trash');
  Route::post('products/restore/{id}',[ProductsController::class,'restore'])->name('products.restore');


Route::get('messages', [AdminMessagesController::class,'index'])->name('messages');
Route::get('messages/show/{id}', [AdminMessagesController::class,'show'])->name('message.show');
Route::post('messages/destroy/{di}', [AdminMessagesController::class,'destroy'])->name('message.destroy');

Route::get('city/city-trashed', [CityController::class, 'trashCity'])->name('city.trash');
Route::post('city/restore/{id}', [CityController::class, 'restore'])->name('city.restore');

Route::resources([
    'users'=> UserController::class,
    'categories' => CategoriesController::class,
    'products' => ProductsController::class,
    'coupons' => CouponController::class,
    'delivery' => DeliveryAgentsController::class,
    'city' => CityController::class,
    'slider' => SliderController::class,
]);

});





require __DIR__.'/auth.php';

/* front route */

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('latest-product', [HomeController::class,'latestProduct'])->name('last_product');
Route::get('product-details/{slug}', [FrontProductsController::class,'prdoductDetails'])->name('product.details');
Route::get('category/{slug}', [CategoryController::class,'products'])->name('category.product');

Route::get('cart', [CartController::class,'index'])->name('cart');
Route::post('add-cart', [CartController::class,'store'])->name('add.cart');
Route::post('update-quantity', [CartController::class,'update_quantity'])->name('update_quantity');

Route::get('wishlist', [WishListController::class,'index'])->name('wishlist');
Route::post('add-wishlist', [WishListController::class,'store'])->name('add.wishlist');


Route::get('contact-us', [MessagesController::class,'index'])->name('contact_us');
Route::post('add-msg', [MessagesController::class,'store'])->name('add.msg');

/* ****** route delivery dashborad ****** */

Route::get('/delivery', function () {
    return view('delivery');
})->middleware('auth','type-user:delivery')->name('delivery');
Route::prefix('delivery')->middleware('auth','type-user:delivery')->as('Delivery.')->group(function(){

    Route::get('/Incoming', [DeliveryController::class, 'index'])->name('incoming');
    Route::get('/get/{id}', [DeliveryController::class, 'get'])->name('get');
    Route::get('/comp/{id}', [DeliveryController::class, 'com'])->name('comp');
    Route::get('/Details/{id}', [DeliveryController::class, 'details'])->name('details');
    Route::get('/recived', [DeliveryController::class, 'recived'])->name('recived');
    Route::get('/complete', [DeliveryController::class, 'complete'])->name('complete');

});

