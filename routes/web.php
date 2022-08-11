<?php

use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::resource('products', AdminProductController::class)->except('index');

    Route::get('/',[AdminProductController::class,'index'])->name('product.index');
});

require __DIR__.'/auth.php';
