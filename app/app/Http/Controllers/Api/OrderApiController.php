<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderApiController extends Controller
{
    public function index()
    {
        return Order::All();
    }

    public function store(Request $request)
    {
        $OrderItem = Order::create([
            'user_id' => $request->user_id,
            'customerName' => $request->customerName,
            'customerLastName' => $request->customerLastName,
            'customerEmail' => $request->customerEmail,
            'customerAddress' => $request->customerAddress,
            'customerPhone' => $request->customerPhone,
            'comment' => $request->comment,
        ]);
        foreach ($request->cartProducts as $product) {
            $Item =
            new OrderItem([
                'price' => $product['price'],
                'quantity' => $product['amount'],
                ]);
            $OrderItem->item()->save($Item);
        }
        return response()->json('It is all right');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
