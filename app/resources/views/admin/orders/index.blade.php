@extends('layouts.layoutAdmin')

@section('title')
    Products
@endsection

@section('main_content')

    <div class="text-dark container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Products </h3>
                <div class="card-tools">
                    <div class="mt-2">
                        {{--                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Create</a>--}}
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>phone</th>
                        <th>address</th>
                        <th>comment</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->getKey() }}</td>
                            <td>
                                <p>{{ $order->customerName }}</p>
                                <p>{{ $order->customerLastName }}</p>
                            </td>
                            <td>{{ $order->customerEmail }}</td>
                            <td>{{ $order->customerPhone }}</td>
                            <td>{{ $order->customerAddress }}</td>
                            <td>{{ $order->comment }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.orders.view', ['order' => $order]) }}"
                                       class="btn btn-warning">View
                                    </a>
                                    @role('admin')
                                    <a href="{{ route('admin.orders.delete', ['order' => $order]) }}"
                                       class="btn btn-danger">Delete
                                    </a>
                                    @endrole
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $orders->links() }}
        </div>
    </div>
@endsection


