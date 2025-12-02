<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $user = Auth::user();
        if($user->role === 'karyawan'){
                return redirect('/karyawan');
            }
        return redirect('/products');
    }
    public function karyawan(){
        $user = Auth::user();
            if($user->role === 'admin'){
                return redirect ('/');
            }
         $products = Product::with('category')->get();
        
        return view('karyawanIndex', [
            'products' => $products
        ]);
    }

    public function show($id){
        $user = Auth::user();
            if($user->role === 'admin'){
                return redirect ('/');
            }
        $product = Product::with('category')->findOrFail($id);
        
        return view('karyawan.show', [
            'product' => $product
        ]);
    }
}
