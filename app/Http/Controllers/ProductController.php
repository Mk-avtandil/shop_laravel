<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function index() : View
    {
        $products = Product::with("category")->paginate(1);
        return view('product.index', ['products' => $products]);
    }

    public function create() : View
    {
        $categories = Category::all();
        return view('product.create', ['categories' => $categories]);
    }

    public function save(SaveProductRequest $request) : RedirectResponse
    {
        Product::create([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'description' => $request->get('description'),
            'category_id' => $request->get('category_id')
        ]);
        return redirect()->back();
    }

    public function delete(Product $product) : RedirectResponse
    {
        $product->delete();
        return redirect()->back();
    }
}
