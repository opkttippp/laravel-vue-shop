@extends('layouts.layout')

@section('title')
    Users
@endsection

@section('main_content')
    {{--    <p><a href="{{route('usersCreate')}}" class="button btn btn-success roles">Create</a></p>--}}
    @foreach($users as $user)
        <div class="roles">
            <h3>User: {{$user->id}}{{' - '}}{{$user->name}}</h3>
            {{--            <p>{{$user->created_at}}</p>--}}
            <p>Role:
                @foreach($user->roles as $role)
                    {{$role->name}}
                @endforeach
            </p>
            {{--            @foreach($permissions as $permission)--}}
            {{--                <div class="mb-3">--}}
            {{--                    <input type="checkbox"--}}
            {{--                           @if($role->hasPermissionTo($permission->name)) checked--}}
            {{--                           @endif--}}
            {{--                           class="form-check-input" id="permission" name="permissions[]" value="{{$permission->id}}">--}}
            {{--                    <label for="permission" class="form-check-label">{{$permission->name}}</label>--}}
            {{--                </div>--}}
            {{--            @endforeach--}}
            @if(auth()->user()->can('edit post'))
                <a href="{{route('usersEdit', $user->id)}}" class="btn btn-primary">Edit</a>
            @endif
            @if(auth()->user()->can('delete post'))
                <a href="{{url('/admin/users/delete', $user->id)}}" class="btn btn-danger">Delete</a>
            @endif
        </div>
    @endforeach
@endsection
