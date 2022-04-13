@extends('layouts.layout')

@section('title')
    Roles
@endsection

@section('main_content')
    @if(auth()->user()->can('add post'))
    <p><a href="{{route('rolesCreate')}}" class="button btn btn-success roles">Create</a></p>
    @endif
    @foreach($roles as $role)
        <div class="message alert alert-primary roles" role="alert" style="width: 40%">
            <h3>{{$role->id}}{{' - '}}{{$role->name}}</h3>
            <p>{{$role->created_at}}</p>
            @if(auth()->user()->can('edit post'))
                <p><a href="{{route('rolesEdit', $role->id)}}" class="button btn btn-primary">Edit</a>
                    @endif
                    @if(auth()->user()->can('delete post'))
                        <a href="{{url('/admin/roles/delete', $role->id)}}" class="button btn btn-danger">Delete</a></p>
            @endif
        </div>
    @endforeach
@endsection
