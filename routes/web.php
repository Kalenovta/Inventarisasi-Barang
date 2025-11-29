<?php

use App\Http\Controllers\admin\productController;
use App\Http\Controllers\categoryController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [productController::class, 'index']);
Route::get('/products/create', [productController::class, 'create']);
Route::get('/products/edit/{id}', [productController::class, 'edit']);
Route::post('/products/store',[productController::class, 'store']);
Route::put('/products/{id}',[productController::class, 'update']);
Route::delete('/products/{id}',[productController::class, 'delete']);

Route::get('/category',[categoryController::class, 'index']);
Route::get('/category/create',[categoryController::class, 'create']);
Route::post('/category/store',[categoryController::class, 'store']);
Route::delete('/category/{id}',[categoryController::class, 'delete']);