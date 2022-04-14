<?php

use App\Http\Controllers\Admin\AdvertisingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\RoleConttroller;
use App\Http\Controllers\Admin\UserConttroller;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Front\CategoryController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\MessagesController;
use App\Http\Controllers\Front\WishListController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\EvaluationController;
use App\Http\Controllers\Delivery\DeliveryController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\DeliveryAgentsController;
use App\Http\Controllers\Admin\GiftsController;
use App\Http\Controllers\Admin\MessagesController as AdminMessagesController;
use App\Http\Controllers\Front\AdvertisingController as FrontAdvertisingController;
use App\Http\Controllers\Front\GiftController;
use App\Http\Controllers\Front\ProductsController as FrontProductsController;
use App\Http\Controllers\Front\ReturnPolicyController;
use App\Http\Controllers\Front\StoreRiviewsController;

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

Route::get('/dashboard/users', [UserController::class, 'index'])->middleware(['auth', 'type-user:admin,super-admin'])->name('users');
Route::get('/dashboard/edit_user/{id}', [UserController::class, 'edit'])->middleware(['auth', 'type-user:admin,super-admin'])->name('user.edit');
Route::post('/dashboard/update_user/{id}', [UserController::class, 'update'])->middleware(['auth', 'type-user:admin,super-admin'])->name('user.update');
Route::get('/dashboard/delete-user/{id}', [UserController::class, 'destroy'])->middleware(['auth', 'type-user:admin,super-admin'])->name('user.destroy');

Route::get('/dashboard/add-roles/{id}', [RoleConttroller::class, 'index'])->middleware(['auth', 'type-user:admin,super-admin'])->name('user.roles');
Route::post('/dashboard/stor-roles/{id}', [RoleConttroller::class, 'store'])->middleware(['auth', 'type-user:admin,super-admin'])->name('user.store_roles');
Route::get('/dashboard/home', function () {
    return view('dashboard');
})->middleware('auth', 'type-user:admin,super-admin')->name('dashboard');

Route::prefix('dashboard')->middleware('auth', 'type-user:admin,super-admin')->as('admin.')->group(function () {

    Route::get('orders', [OrderController::class, 'index'])->name('orders');
    Route::get('orders/details/{id}', [OrderController::class, 'orderDetails'])->name('orders.details');
    Route::get('orders/eval/{id}', [OrderController::class, 'orderEval'])->name('orders.eval');

    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('categories/categories-trashed', [CategoriesController::class, 'trashCategory'])->name('categories.trash');
    Route::post('categories/restore/{id}', [CategoriesController::class, 'restore'])->name('categories.restore');
    Route::get('products/products-trashed', [ProductsController::class, 'trashProduct'])->name('products.trash');
    Route::post('products/restore/{id}', [ProductsController::class, 'restore'])->name('products.restore');
    Route::post('products/image/{id}', [ProductsController::class, 'deleteImage'])->name('delete.image');


    Route::get('messages', [AdminMessagesController::class, 'index'])->name('messages');
    Route::get('messages/show/{id}', [AdminMessagesController::class, 'show'])->name('message.show');
    Route::post('messages/destroy/{di}', [AdminMessagesController::class, 'destroy'])->name('message.destroy');

    Route::get('city/city-trashed', [CityController::class, 'trashCity'])->name('city.trash');
    Route::post('city/restore/{id}', [CityController::class, 'restore'])->name('city.restore');
    Route::get('setting/about-us', [SettingController::class, 'aboutUS'])->name('setting.about-us');
    Route::post('setting/about-us', [SettingController::class, 'updateAboutUS'])->name('setting.about-us.update');

    Route::resources([
        'users' => UserController::class,
        'categories' => CategoriesController::class,
        'products' => ProductsController::class,
        'coupons' => CouponController::class,
        'gifts' => GiftsController::class,
        'delivery' => DeliveryAgentsController::class,
        'city' => CityController::class,
        'slider' => SliderController::class,
        'advertising' => AdvertisingController::class,
    ]);


    /* ****** route evaluations dashborad ****** */


    Route::prefix('Evaluation')->middleware('auth', 'type-user:admin,super-admin')->as('evaluation.')->group(function () {
        Route::prefix('Delivery')->as('delivery.')->group(function () {

            Route::get('/', [EvaluationController::class, 'index_delivery'])->name('index');
            Route::get('/index', [EvaluationController::class, 'index_delivery'])->name('index2');
            Route::delete('/delete/{id}', [EvaluationController::class, 'delete_delivery'])->name('delete');
            Route::post('/change/{id}', [EvaluationController::class, 'change_delivery'])->name('change');
        });
        Route::prefix('Products')->as('products.')->group(function () {

            Route::get('/', [EvaluationController::class, 'index_products'])->name('index');
            Route::get('/index', [EvaluationController::class, 'index_products'])->name('index2');
            Route::delete('/delete/{id}', [EvaluationController::class, 'delete_products'])->name('delete');
            Route::post('/change/{id}', [EvaluationController::class, 'change_products'])->name('change');
        });

        Route::prefix('store')->as('store.')->group(function () {

            Route::get('/', [EvaluationController::class, 'store_reviews'])->name('index');
            Route::delete('/delete/{id}', [EvaluationController::class, 'delete_store_review'])->name('delete');
        });
    });
});





require __DIR__ . '/auth.php';

/* front route */

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/gifts', [GiftController::class, 'gifts'])->name('gift');
Route::get('/advertising', [FrontAdvertisingController::class, 'index'])->name('advertising');
Route::get('/gift-details/{id}', [GiftController::class, 'giftDetails'])->name('gift.details');

Route::get('latest-product', [HomeController::class, 'latestProduct'])->name('last_product');
Route::get('product-details/{slug}', [FrontProductsController::class, 'prdoductDetails'])->name('product.details');
Route::get('category/{slug}', [CategoryController::class, 'products'])->name('category.product');

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('add-cart', [CartController::class, 'store'])->name('add.cart');
Route::post('update-quantity', [CartController::class, 'update_quantity'])->name('update_quantity');
Route::get('cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::post('shipping-price', [CartController::class, 'shipping_price']);

Route::post('add-gift', [CartController::class, 'addGift'])->name('add.gift');

Route::get('wishlist', [WishListController::class, 'index'])->name('wishlist');
Route::post('add-wishlist', [WishListController::class, 'store'])->name('add.wishlist');


Route::get('contact-us', [MessagesController::class, 'index'])->name('contact_us');
Route::post('add-msg', [MessagesController::class, 'store'])->name('add.msg');

Route::post('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::get('checkout/payments/{id}', [CheckoutController::class, 'formPayment'])->name('checkout.payment');
Route::get('checkout/{order_id}/callback', [CheckoutController::class, 'callback'])->name('checkout.callback');
Route::get('Return-and-exchange-policy', [ReturnPolicyController::class, 'index'])->name('return.policy');
Route::get('store-reviews', [StoreRiviewsController::class, 'index'])->name('store.reviews');
Route::post('store-reviews/store', [StoreRiviewsController::class, 'store'])->name('store-reviews');

/* ****** route evaluation ****** */
Route::post('eval-product/{id}', [EvaluationController::class, 'eval_product2'])->where('id', '.*')->name('evalProduct');
Route::get('eval-product/{id}', [EvaluationController::class, 'eval_product'])->where('id', '.*')->name('eval.product');

Route::get('eval-delivery/{id}', [EvaluationController::class, 'eval_delivery'])->where('id', '.*');
Route::post('eval-delivery/{id}', [EvaluationController::class, 'eval_delivery2'])->where('id', '.*')->name('evalDelivery');

/* ****** route delivery dashborad ****** */

Route::get('/delivery', function () {
    return view('delivery');
})->middleware('auth', 'type-user:delivery')->name('delivery');
Route::prefix('delivery')->middleware('auth', 'type-user:delivery')->as('Delivery.')->group(function () {

    Route::get('/Incoming', [DeliveryController::class, 'index'])->name('incoming');
    Route::get('/get/{id}', [DeliveryController::class, 'get'])->name('get');
    Route::get('/comp/{id}', [DeliveryController::class, 'com'])->name('comp');
    Route::get('/Details/{id}', [DeliveryController::class, 'details'])->name('details');
    Route::get('/recived', [DeliveryController::class, 'recived'])->name('recived');
    Route::get('/complete', [DeliveryController::class, 'complete'])->name('complete');
});
