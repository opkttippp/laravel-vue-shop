@extends('layouts.layoutAdmin')

@section('title')
    Categories
@endsection

@section('main_content')

    <div class="text-dark container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Categories </h3>
                <div class="card-tools">
                    <div class="mt-2">
                        <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Create</a>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr style="text-align: center;">
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Color</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        @if(!$category->trashed())
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td style="width: 10%;">{{ $category->name }}</td>
                                <td style="width: 30%; overflow: hidden; height: 80px;">
                                    <img src="{{asset('storage/'.$category->image)}}" alt="image"
                                         style="width: 90%; height: 90%; margin: 10px; object-fit: contain;">
                                </td>
                                <td style="width: 25%; margin-left: 70px;">
                                    <div
                                        style="border: 1px solid darkslategray; width: 50px; height: 50px; margin-left: 35%; background-color:{{$category->color}}; ">
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.category.edit', ['category' => $category->getKey()]) }}"
                                           class="btn btn-warning">Edit</a>
                                        <a href="{{ route('admin.category.delete', ['category' => $category->getKey()]) }}"
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
            {{ $categories->links() }}
        </div>
    </div>

    @if(count($trashedCategories) > 0)
        <div class="col-12 text-dark">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> Trashed </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Color</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($trashedCategories as $trashedCategory)
                            {{--                                @canany(['can-destroy', 'can-restore'], $trashedProduct)--}}
                            <tr>
                                <td>{{ $trashedCategory->getKey() }}</td>
                                <td>{{ $trashedCategory->name }}</td>
                                <td style="width: 25%;">
                                    <img src="{{asset('storage/'.$trashedCategory->image)}}" alt="image"
                                         style="width: 35%; height: 35%; margin: 10px;">
                                </td>
                                <td style="width: 25%;">
                                    <div
                                        style="border: 1px solid darkslategray; width: 50px; height: 50px; background-color:{{$category->color}}; ">
                                    </div>
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.category.restore', ['id' => $trashedCategory->getKey()]) }}"
                                           class="btn btn-warning">Restore</a>
                                        @role('admin')
                                        <a href="{{ route('admin.category.destroy', ['id' => $trashedCategory->getKey()]) }}"
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


