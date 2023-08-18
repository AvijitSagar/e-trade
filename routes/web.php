<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UnitController;
use App\Models\SubCategory;
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
Route::get('/product/details', [HomeController::class, 'productDetails'])->name('details.product');
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout');
Route::get('/user/login', [HomeController::class, 'userLogin'])->name('login.user');
Route::get('/user/register', [HomeController::class, 'userRegister'])->name('register.user');
Route::get('/user/password/recovery', [HomeController::class, 'userFrogotPassword'])->name('recover.password.user');
Route::get('/user/account', [HomeController::class, 'userAccount'])->name('account.user');

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
    Route::get('get-subcategory-by-category', [ProductController::class, 'getSubCategoryByCategory'])->name('get-subcategory-by-category');
    Route::get('product/update-featured-status/{id}', [ProductController::class, 'updateFeaturedStatus'])->name('product.updateFeaturedStatus');
});
