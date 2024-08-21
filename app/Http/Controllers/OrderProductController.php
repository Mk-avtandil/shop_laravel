<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;


class OrderProductController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('order.index', ['orders' => $orders]);
    }

    public function add(Product $product)
    {
        $cartItem = Order::where('name', $product['name'])->first();
        if ($cartItem) {
            $cartItem->quantity++;
            $cartItem->save();
        } else {
            Order::create([
                'name' => $product['name'],
                'price' => $product['price'],
                'description' => $product['description'],
                'category_id' => $product['category_id'],
                'quantity' => 1,
            ]);
        }
        return redirect()->back();
    }

    public function clearOrder()
    {
        Order::truncate();
        return redirect()->back();
    }
}
