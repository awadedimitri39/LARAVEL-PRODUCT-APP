<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();

        return view('category.index',[
           'categories' => $categories
        ]);
    }

    public function show($id){
        $category = Category::find($id);
        return view('category.show',compact('category'));
    }
}
