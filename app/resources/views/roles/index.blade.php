@extends('layouts.layout')

@section('title')
    Roles
@endsection

@section('main_content')
        @if(auth()->user()->can('add post'))
            <p><a href="{{route('rolesCreate')}}" class="create button btn btn-success mt-2">Create</a></p>
        @endif
        @foreach($roles as $role)
            <div class="roles">
                {{$role->id}}{{' - '}}<h3>{{$role->name}}</h3>{{$role->created_at}}
                @if(auth()->user()->can('edit post'))
                    <a href="{{route('rolesEdit', $role->id)}}" class="btn btn-primary">Edit</a>
                        @endif
                        @if(auth()->user()->can('delete post'))
                            <a href="{{url('/admin/roles/delete', $role->id)}}" class="button btn btn-danger">Delete</a>

                @endif
            </div>
        @endforeach
@endsection
