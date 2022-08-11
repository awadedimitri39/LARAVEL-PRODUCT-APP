<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ProductController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', [ProductController::class,'index'])->name('products.index');

Route::middleware(['auth'])->group(function(){
    Route::get('product/{id}',[ProductController::class,'show'])->name('product.show');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[AdminProductController::class,'index'])->name('adProducts.index');
    Route::resource('adProducts', AdminProductController::class)->except('index');
});



require __DIR__.'/auth.php';
