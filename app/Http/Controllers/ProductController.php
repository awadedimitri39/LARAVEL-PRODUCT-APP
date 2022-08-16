<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::with('category')->latest()->get();
        
        return view('product.index',compact('products'));
    }

    public function show($id){
        $product = Product::find($id);
        return view('product.show',compact('product'));
    }
}
