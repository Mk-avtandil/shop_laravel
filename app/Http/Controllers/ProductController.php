<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return view('product.index', compact('products'));
    }

    public function create(Products $product)
    {
        return view('product.create');
    }

    public function save(Products $product)
    {
        
    }

    public function delete(Products $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
