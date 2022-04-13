@extends('layouts.layout')

@section('title')
    Create
@endsection

@section('main_content')
    <div class="message alert alert-primary roles" role="alert" style="width: 40%">
        <p><a href="{{url('/admin/roles')}}" class="button btn btn-success ">Return</a></p>
        <form method="post" action="{{route('rolesUpdate', $role->id)}}">
            @csrf
            <div class="mb-5">
                <label for="title" style="text-align: center">Name</label>
                <input type="text" name="name" class="form-control" style="text-align: center" id="title" value="{{$role->name}}">
            </div>
            @foreach($permissions as $permission)
                <div class="mb-3">
                    <input type="checkbox"
                           @if($role->hasPermissionTo($permission->name)) checked
                           @endif
                           class="form-check-input" id="permission" name="permissions[]" value="{{$permission->id}}">
                    <label for="permission" class="form-check-label">{{$permission->name}}</label>
                </div>
            @endforeach
            <button type="submit" class="button btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
