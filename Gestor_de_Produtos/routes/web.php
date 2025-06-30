<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;




Route::get('/', [ProductController::class, 'index'])->name('home.public');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/brands', [BrandController::class, 'index'])->name('brands.index');
Route::get('/brands/{brand}', [BrandController::class, 'show'])->name('brands.show');


Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [UserController::class, 'register']);


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/manage-users', [UserController::class, 'manageUsers'])->name('manage_users');
        Route::put('/update-permission/{user}', [UserController::class, 'updatePermission'])->name('update_permission');
        Route::delete('/delete-user/{user}', [UserController::class, 'destroy'])->name('delete_user');
    });


    Route::prefix('management')->name('management.')->group(function () {
        Route::get('/products-test', [UserController::class, 'productManagementTest'])->name('products');    
        Route::get('/categories-test', [UserController::class, 'categoryManagementTest'])->name('categories'); 
        Route::get('/brands-test', [UserController::class, 'brandManagementTest'])->name('brands'); 
    });

});