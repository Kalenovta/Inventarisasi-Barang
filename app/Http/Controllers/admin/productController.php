<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index(){
        return view('layouts.pages.products.index');
    }
}
