<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['item'])->paginate();
        return view('admin.orders.index', ['orders' => $orders]);
    }

    public function show(Order $order)
    {
        return view(
            'admin.orders.view',
            compact('order')
        );
    }

    public function destroy(Order $order)
    {

        $order->item()->delete();
        $order->delete();

        return redirect()->back()->with(
            'success',
            'Success delete'
        );
    }
}
