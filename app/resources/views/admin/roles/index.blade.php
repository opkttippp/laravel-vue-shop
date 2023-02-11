@extends('layouts.layout')

@section('title')
    Roles
@endsection

@section('main_content')
    <div class="col-12 text-dark">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@yield('title')</h3>
                <div class="card-tools">
                    {{--                    {{ $products->links() }}--}}
                    <div class="mt-2">
                        @if(auth()->user()->can('add'))
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-primary">Create</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                    <tr>
                        <th>Role</th>
                        <th>Name</th>
                        <th>Data</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                            <td>{{$role->created_at}}</td>
                            <td>
                                <div class="btn-group">
                                    @if(auth()->user()->can('edit'))
                                        <a href="{{route('admin.roles.edit', $role->id)}}" class="btn btn-primary">Edit</a>
                                    @endif
                                    @if(auth()->user()->can('delete'))
                                        <a href="{{url('/admin/roles/delete', $role->id)}}"
                                           class="btn btn-danger">Delete</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
