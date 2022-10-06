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
                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Create</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table dark">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Categories</th>
                        <th>Price</th>
                        <th>Barcode</th>
                        <th>Stock</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        @if(!$product->trashed())
                            <tr>
                                <td>{{ $product->getKey() }}</td>
                                <td>{{ $product->title }}</td>
                                <td>
                                            <span class="badge
                                             @if ($product->category->id == 1)
                                                bg-teal
@elseif($product->category->id == 2)
                                                bg-purple
@elseif($product->category->id == 3)
                                                bg-maroon
@elseif($product->category->id == 4)
                                                bg-navy
@elseif($product->category->id == 5)
                                                bg-success
@endif
                                                mr-1">{{ $product->category->name }}
                                            </span>
                                </td>
                                <td>${{ $product->price }}</td>
                                <td>{{ $product->barcode }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.products.edit', ['product' => $product->getKey()]) }}"
                                           class="btn btn-warning">Edit</a>
                                        <a href="{{ route('admin.products.delete', ['product' => $product->getKey()]) }}"
                                           class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>

    @if(count($trashedProducts) > 0)
        <div class="col-12 text-dark">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Trashed </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Barcode</th>
                            <th>Stock</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($trashedProducts as $trashedProduct)
                            {{--                                @canany(['can-destroy', 'can-restore'], $trashedProduct)--}}
                            <tr>
                                <td>{{ $trashedProduct->getKey() }}</td>
                                <td>{{ $trashedProduct->title }}</td>
                                <td>{{ $trashedProduct->barcode }}</td>
                                <td>{{ $trashedProduct->stock }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.products.restore', ['id' => $trashedProduct->getKey()]) }}"
                                           class="btn btn-warning">Restore</a>
                                        @role('admin')
                                        <a href="{{ route('admin.products.destroy', ['id' => $trashedProduct->getKey()]) }}"
                                           class="btn btn-danger">DROP</a>
                                        @endrole
                                    </div>
                                </td>
                            </tr>
                            {{--                                @endcanany--}}
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection

