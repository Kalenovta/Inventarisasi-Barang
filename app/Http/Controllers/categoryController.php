<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function index(){
        $categorys = Category::all();
        return view('layouts.pages.category.index',
    ['categorys' => $categorys,]);
    }

    public function create(){
        return view('layouts.pages.category.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            "name" => "required",
            "description" => "required"
        ]);

        Category::create($validated);
        return redirect('/category');
    }

    public function delete($id){
        $category = Category::where('id',$id);
        $category->delete();

        return redirect('/category');
    }
}
