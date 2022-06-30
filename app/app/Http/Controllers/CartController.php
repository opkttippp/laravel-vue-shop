<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }
    public function add($product_id)
    {
        $product = Product::findOrFail($product_id);
        Cart::add($product->id, $product->title, 1, $product->price);
        return redirect()->back();
    }
}
