<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartUpdateRequest;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }
    public function add($productId)
    {
        $product = Product::findOrFail($productId);
        $cartRow = Cart::add($product->id, $product->title, 1, $product->price);
        $cartRow->associate(Product::class);

        return redirect()->back();
    }

    public function update(CartUpdateRequest $request)
    {
        Cart::update($request->productId, $request->qty);

        return redirect()->route('cart.index');
    }

    public function drop($productId)
    {
//        dd($productId);
        Cart::remove($productId);
        return redirect()->route('cart.index');
    }

    public function destroy()
    {
        Cart::destroy();
        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        return view('order.checkout');
    }

    public function success($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('cart.success', compact('order'));
    }
}
