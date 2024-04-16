<?php

use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CourierController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerDashboardController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/product/{id}/details', [HomeController::class, 'productDetails'])->name('details.product');
Route::get('/category/{id}/products', [HomeController::class, 'categoryWiseProducts'])->name('category.wise.products');

Route::post('/add-to-cart/{id}', [CartController::class, 'index'])->name('cart.add');
Route::get('/shopping-cart', [CartController::class, 'show'])->name('cart.show');
Route::get('/delete-shopping-cart/{id}', [CartController::class, 'delete'])->name('cart.delete');
Route::post('/update-shopping-cart/{id}', [CartController::class, 'update'])->name('cart.update');

Route::get('/cart', [CartController::class, 'cart'])->name('cart');


// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END


Route::get('/check-out', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/new-order', [CheckoutController::class, 'newOrder'])->name('order.new');
Route::get('/complete-order', [CheckoutController::class, 'completeOrder'])->name('order.complete');

Route::get('/customer/login', [CustomerAuthController::class, 'login'])->name('login.customer');
Route::post('/customer/login', [CustomerAuthController::class, 'loginCheck'])->name('login.customer');
Route::get('/customer/register', [CustomerAuthController::class, 'registration'])->name('register.customer');
Route::post('/customer/register', [CustomerAuthController::class, 'newRegistration'])->name('register.customer');
Route::get('/customer/logout', [CustomerAuthController::class, 'logout'])->name('logout.customer');
Route::get('/customer/password/recovery', [CustomerAuthController::class, 'recoverPassword'])->name('recover.password.customer');


Route::get('/my-dashboard', [CustomerDashboardController::class, 'index'])->name('dashboard.customer');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('dashboard');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/category', CategoryController::class);

    Route::get('/sub-category', [SubCategoryController::class, 'create'])->name('sub-category.create');
    Route::post('/sub-category/add', [SubCategoryController::class, 'store'])->name('sub-category.store');
    Route::get('/sub-category/manage', [SubCategoryController::class, 'index'])->name('sub-category.index');
    Route::get('/sub-category/{id}/edit', [SubCategoryController::class, 'edit'])->name('sub-category.edit');
    Route::post('/sub-category/{id}/update', [SubCategoryController::class, 'update'])->name('sub-category.update');
    Route::get('/sub-category/{id}/delete', [SubCategoryController::class, 'destroy'])->name('sub-category.destroy');

    Route::resource('unit', UnitController::class);

    Route::resource('brand', BrandController::class);

    Route::resource('product', ProductController::class);

    Route::resource('courier', CourierController::class);

    Route::get('get-subcategory-by-category', [ProductController::class, 'getSubCategoryByCategory'])->name('get-subcategory-by-category');
    Route::get('product/update-featured-status/{id}', [ProductController::class, 'updateFeaturedStatus'])->name('product.updateFeaturedStatus');

    Route::get('/admin/manage-order', [AdminOrderController::class, 'index'])->name('order.index');
    Route::get('/admin/order-detail/{id}', [AdminOrderController::class, 'detail'])->name('admin.order-detail');
    Route::get('/admin/order-edit/{id}', [AdminOrderController::class, 'edit'])->name('admin.order-edit');
    Route::get('/admin/order-invoice/{id}', [AdminOrderController::class, 'invoice'])->name('admin.order-invoice');
    Route::get('/admin/download-invoice/{id}', [AdminOrderController::class, 'download'])->name('admin.download-invoice');
    Route::get('/admin/order-delete/{id}', [AdminOrderController::class, 'delete'])->name('admin.order-delete');
    Route::post('/admin/order-update/{id}', [AdminOrderController::class, 'update'])->name('admin.order-update');
});
