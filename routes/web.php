<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    // Add other admin-only routes here
    Route::get('/slider', [SliderController::class, 'index'])->name('slider.index');
Route::get('/slider/create', [SliderController::class, 'create']);
Route::post('/slider/store', [SliderController::class, 'store']);
Route::get('/slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
Route::post('/slider/{id}/update', [SliderController::class, 'update']);
Route::post('/slider/{id}/delete', [SliderController::class, 'destroy'])->name('slider.destroy');

Route::get('/brand', [BrandController::class, 'index'])->name('brand.index');
Route::get('/brand/create', [BrandController::class, 'create']);
Route::post('/brand/store', [BrandController::class, 'store']);
Route::get('/brand/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
Route::post('/brand/{id}/update', [BrandController::class, 'update']);
Route::post('/brand/{id}/delete', [BrandController::class, 'destroy'])->name('brand.destroy');

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::get('/category/create', [CategoryController::class, 'create']);
Route::post('/category/store', [CategoryController::class, 'store']);
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/{id}/update', [CategoryController::class, 'update']);
Route::post('/category/{id}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/product/create', [ProductController::class, 'create']);
Route::post('/product/store', [ProductController::class, 'store']);
Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::post('/product/{id}/update', [ProductController::class, 'update']);
Route::post('/product/{id}/delete', [ProductController::class, 'destroy'])->name('product.destroy');
});


Route::get('register',[AuthController::class,'registerView'])->name('register');
Route::post('post-register',[AuthController::class,'postRegister'])->name('postRegister');
Route::get('login',[AuthController::class,'loginView'])->name('login');
Route::post('post-login',[AuthController::class,'postLogin'])->name('postLogin');
Route::get('logout',[AuthController::class,'logout'])->name('logout');


Route::get('/', [SiteController::class, 'home']);

Route::get('/shop',[SiteController::class,'shop']);
Route::get('/product-detail',[SiteController::class,'productDetail']);

//Route::redirect('/', '/dashboard');
// Route::get('/dashboard', [DashboardController::class, 'dashboard']);
Route::post('/upsert-product-qty',[CartController::class, 'upsertProductQty']) ->name('upsertProductQty');
Route::get('/cart',[CartController::class, 'cartView']) ->name('cartView');
Route::get('/add-to-cart/{product_id}',[CartController::class, 'addToCart']) ->name('addToCart');
Route::get('/remove-from-cart/{product_id}',[CartController::class, 'removeCart']) ->name('removeCart');


