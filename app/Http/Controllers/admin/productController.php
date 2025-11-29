<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Pest\Laravel\delete;

class productController extends Controller
{
    public function index(){
        $products = Product::with('category')->get();

        return view('layouts.pages.products.index', [
            "products" => $products,
        ]);
    }

    public function create(){
        $categories = Category::all();

        return view('layouts.pages.products.create',[
            "categories" => $categories,
        ]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            "name" => "required|min:3",
            "price" => "required",
            "stock" => "required",
            "description" => "nullable",
            "sku" => "required",
            "category_id" => "required"
        ]);

        Product::create($validated);

        return redirect('/products');
    }

    public function edit($id){
        $categories = Category::all();
        $product = Product::findOrFail($id);

        return view('layouts.pages.products.edit',[
            "categories" => $categories,
            "product" => $product,
        ]);
    }
    public function update(Request $request, $id){
        $validated = $request->validate([
            "name" => "required|min:3",
            "price" => "required",
            "stock" => "required",
            "description" => "nullable",
            "sku" => "required",
            "category_id" => "required"
        ]);

        Product::where('id', $id)->update($validated);

        return redirect('/products');
    }
    public function delete($id)
    {
        $product = Product::where('id', $id);
        $product->delete();

        return redirect('/products');
    }
}
