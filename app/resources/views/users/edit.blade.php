@extends('layouts.layout')

@section('title')
    Edit
@endsection

@section('main_content')
    <div class="form-roles">
        <p><a href="{{url('/admin/users')}}" class="button btn btn-success ">Return</a></p>
        <form method="post" action="{{route('usersUpdate', $user->id)}}">
            @csrf
            <div class="mb-5">
                <label for="name" style="text-align: center">Name</label>
                <input type="text" name="name" class="form-control" style="text-align: center" id="name"
                       value="{{$user->name}}">
            </div>
            <label for="role">Roles</label>
            <select class="form-control" name="role" id="role">
                @foreach($roles as $role)
                    <option value="{{$role->id}}"
                            @if($user->hasRole($role->name)) selected @endif>{{$role->name}}</option>
                @endforeach
            </select>
            <p></p>
            <button type="submit" class="button btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
