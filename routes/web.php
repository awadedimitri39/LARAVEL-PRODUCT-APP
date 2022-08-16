<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\Route;

//Products Routes
Route::get('/', [ProductController::class,'index'])->name('products.index'); //All products
Route::middleware(['auth'])->group(function(){
    Route::get('product/{id}',[ProductController::class,'show'])->name('product.show'); //Show one product if you are authentificted
});

//Category Routes
Route::get('/categories',[CategoryController::class,'index'])->name('categories.index'); //All categories
Route::get('category/{id}',[CategoryController::class,'show'])->name('category.show');// Show one category



//Comment Routes
Route::post('comments',[CommentController::class,'store'])->name('comment.store');
Route::get('comment/{id}',[CommentController::class,'getCommentsByUserId'])->name('comment.show');


//Dashboard Routes
Route::get('dashboard', [DashboardController::class,'index'])->middleware(['auth'])->name('dashboard');


//Admin Routes
Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')->group(function(){
    //Dashboard Route
    Route::get('/',[AdminDashboardController::class,'index'])->name('index');

    //Products Route
    Route::get('products',[AdminProductController::class,'index'])->name('products.index');
    Route::resource('products', AdminProductController::class)->except('index');

    //Users Routes
    Route::get('users',[AdminUserController::class,'index'])->name('users.index');
    Route::resource('users', AdminUserController::class)->except('index');

    //Category Routes
    Route::get('categories',[AdminCategoryController::class,'index'])->name('categories.index');
    Route::resource('categories', AdminCategoryController::class)->except('index');
});



require __DIR__.'/auth.php';
