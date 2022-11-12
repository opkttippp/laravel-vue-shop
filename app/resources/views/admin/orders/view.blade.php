@extends('layouts.layoutAdmin')

@section('title')
    Orders Item
@endsection

@section('main_content')

    <div class="text-dark container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Orders Item № {{$order->id}} </h3>
                <div class="card-tools">
                    <div class="mt-2">
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Return</a>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Goods</th>
                        <th>Title</th>
                        <th>Images</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->item as $orderItem)
                        <tr>
                            <td>{{ $orderItem->getKey() }}</td>
                            <td>{{ $orderItem->product_id }}</td>
                            <td>
                                <a href="{{ url('product#/show/'.$orderItem->product_id) }}">
                                    {{ \App\Models\Product::where('id', $orderItem->product_id)->value('title') }}
                                </a>
                            </td>
                            <td style="height: 50px; width: 50px;">
                                <img
                                    src="{{asset('storage/'. \App\Models\Product::where('id', $orderItem->product_id)->value('image'))}}"
                                    alt="image"
                                    style="width: 80%; height: 80%; object-fit: contain; margin: 10px;">
                            </td>
                            <td>{{ $orderItem->price }}</td>
                            <td>{{ $orderItem->quantity }}</td>
                            <td>{{ $orderItem->price * $orderItem->quantity }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th>total</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>{{ $order->total }}</th>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection


