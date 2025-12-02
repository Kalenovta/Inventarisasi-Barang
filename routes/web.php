<?php

use App\Http\Controllers\admin\productController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\isLogin;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'loginView']);
Route::post('/loginProcess', [AuthController::class, 'login']);

Route::get('/register',[AuthController::class, 'register']);
Route::post('/registerprocess', [AuthController::class, 'registerProcess'])->name('registerProcess');

Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/',[DashboardController::class, "index"])->middleware(isLogin::class);
Route::get('/karyawan',[DashboardController::class, "Karyawan"]);
Route::get('/karyawan/product/{id}', [DashboardController::class, 'show']);

Route::get('/products', [productController::class, 'index'])->middleware(isLogin::class);
Route::get('/products/create', [productController::class, 'create'])->middleware(isLogin::class);
Route::get('/products/edit/{id}', [productController::class, 'edit'])->middleware(isLogin::class);
Route::post('/products/store',[productController::class, 'store'])->middleware(isLogin::class);
Route::put('/products/{id}',[productController::class, 'update'])->middleware(isLogin::class);
Route::delete('/products/{id}',[productController::class, 'delete'])->middleware(isLogin::class);

Route::get('/category',[categoryController::class, 'index'])->middleware(isLogin::class);
Route::get('/category/create',[categoryController::class, 'create'])->middleware(isLogin::class);
Route::post('/category/store',[categoryController::class, 'store'])->middleware(isLogin::class);
Route::delete('/category/{id}',[categoryController::class, 'delete'])->middleware(isLogin::class);