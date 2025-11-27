<?php

use App\Http\Controllers\admin\productController;
use Illuminate\Support\Facades\Route;

Route::get('/products', [productController::class, 'index']);
