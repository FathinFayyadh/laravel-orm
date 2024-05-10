<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/product', [ProductController::class,'getProduct'])->name('product.create');
Route::get('{user}/form', [ProductController::class,'formRequest'])->name('form.product');
Route::post('{user}/form/create', [ProductController::class,'formCreate'])->name('form.create');
Route::get('/admin/{user}/listproduct', [ProductController::class,'getAdmin'])->name('admin.create');
Route::get('/{user}/product/{product}', [ProductController::class, 'editProduct'])->name('edit.product');
Route::put('/{user}/product/{product}/update', [ProductController::class, 'updatebyProduct'])->name('update.product');
Route::get('/{user}/product/{product}/delete', [ProductController::class, 'deleteProduct'])->name('delete.product');

Route::post('/{user}/post/ajax-store', [ProductController::class,'ajaxProduct'])->name('post.ajax');
Route::put('/{user}/post/ajax-update/{product}', [ProductController::class,'ajaxProductUpdate'])->name('post.ajaxUpdate');