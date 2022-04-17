@extends('layouts.layout')

@section('title')
    Create
@endsection

@section('main_content')
<div class="form-roles">
        <p><a href="{{url('/admin/roles')}}" class="button btn btn-success">Return</a></p>
        <form method="post" action="{{route('rolesStore')}}">
            @csrf
            <div class="mb-3">
                <label for="title">Name</label>
                <input type="text" name="name" class="form-control" id="title">
            </div>
            @foreach($permissions as $permission)
                <div class="mb-3">
                    <input type="checkbox" class="form-check-input" value="{{$permission->id}}" id="permission"
                           name="permissions[]">
                    <label for="permission" class="form-check-label">{{$permission->name}}</label>
                </div>
            @endforeach
            <button type="submit" class="button btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
