<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class CartProductController extends Controller
{
    public function index() : View
    {

        $products = Cart::with('product')->get();
        return view('cart.index', ['products' => $products]);
    }

    public function add(Product $product) : RedirectResponse
    {
        $cartItem = Cart::where('product_id', $product->id)->first();
        if ($cartItem) {
            $cartItem->quantity++;
            $cartItem->save();
        } else {
            Cart::create([
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }
        return redirect()->back();
    }

    public function clearCart() : RedirectResponse
    {
        Cart::truncate();
        return redirect()->back();
    }
}
