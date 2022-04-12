@extends('layouts.layout')

@section('Roles')
    Roles
@endsection

@section('main_content')
    @foreach($roles as $role)
        <div class="alert alert-info">
            <h3>{{$role->id}}</h3>
            <b>{{$role->name}}</b>
            <p>{{$role->created_at}}</p>
        </div>
    @endforeach
@endsection
