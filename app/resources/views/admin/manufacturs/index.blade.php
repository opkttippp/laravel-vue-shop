@extends('layouts.layout')

@section('title')
    Products
@endsection

@section('main_content')

    <div class="text-dark container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Manufacturs </h3>
                <div class="card-tools">
                    <div class="mt-2">
                        <a href="{{ route('admin.manufactur.create') }}" class="btn btn-primary">Create</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Names</th>
                        <th>Country</th>
                        <th>Image</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rev as $manufactur)

                            <tr>
                                <td>{{ $manufactur->getKey() }}</td>
                                <td>{{ $manufactur->name }}</td>
                                <td>{{ $manufactur->country }}</td>
                                <td style="overflow: hidden;">
                                    <img src="{{asset('storage/'.$manufactur->image)}}" alt="image"
                                         style="height: 52px; width: 54px; margin: 10px; object-fit: contain;">
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('admin.manufactur.edit', ['manufactur' => $manufactur->getKey()]) }}"
                                           class="btn btn-warning">Edit</a>
                                        <a href="{{ route('admin.manufactur.delete', ['manufactur' => $manufactur->getKey()]) }}"
                                           class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $rev->links() }}
        </div>
    </div>
@endsection

