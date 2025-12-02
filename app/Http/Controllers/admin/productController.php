<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class productController extends Controller
{
    public function index(){
        $user = Auth::user();
        if($user->role === 'karyawan'){
                return redirect('/karyawan');
            }
        $products = Product::with('category')->get();

        return view('layouts.pages.products.index', [
            "products" => $products,
        ]);
    }

    public function create(){
        $user = Auth::user();
        if($user->role === 'karyawan'){
                return redirect('/karyawan');
            }
        $categories = Category::all();

        return view('layouts.pages.products.create',[
            "categories" => $categories,
        ]);
    }

    public function store(Request $request){
        $user = Auth::user();
        if($user->role === 'karyawan'){
                return redirect('/karyawan');
            }
        $validated = $request->validate([
            "name" => "required|min:3",
            "price" => "required",
            "stock" => "required|numeric|min:0",
            "description" => "nullable",
            "sku" => "required",
            "category_id" => "required",
            "photo" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048", // Validasi foto
        ]);

        // Handle upload foto
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photoPath = $photo->storeAs('products', $photoName, 'public');
            $validated['photo'] = $photoPath;
        }

        Product::create($validated);

        return redirect('/products')->with('success', 'Produk berhasil ditambahkan');
    }

    public function edit($id){
        $user = Auth::user();
        if($user->role === 'karyawan'){
                return redirect('/karyawan');
            }
        $categories = Category::all();
        $product = Product::findOrFail($id);

        return view('layouts.pages.products.edit',[
            "categories" => $categories,
            "product" => $product,
        ]);
    }

    public function update(Request $request, $id){
        $user = Auth::user();
        if($user->role === 'karyawan'){
                return redirect('/karyawan');
            }
        $validated = $request->validate([
            "name" => "required|min:3",
            "price" => "required",
            "stock" => "required|numeric|min:0",
            "description" => "nullable",
            "sku" => "required",
            "category_id" => "required",
            "photo" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ]);

        $product = Product::findOrFail($id);

        // Handle upload foto baru
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($product->photo && Storage::disk('public')->exists($product->photo)) {
                Storage::disk('public')->delete($product->photo);
            }

            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photoPath = $photo->storeAs('products', $photoName, 'public');
            $validated['photo'] = $photoPath;
        }

        $product->update($validated);

        return redirect('/products')->with('success', 'Produk berhasil diupdate');
    }

    public function delete($id)
    {
        $user = Auth::user();
        if($user->role === 'karyawan'){
                return redirect('/karyawan');
            }
        $product = Product::findOrFail($id);
        
        // Hapus foto jika ada
        if ($product->photo && Storage::disk('public')->exists($product->photo)) {
            Storage::disk('public')->delete($product->photo);
        }

        $product->delete();

        return redirect('/products')->with('success', 'Produk berhasil dihapus');
    }
}