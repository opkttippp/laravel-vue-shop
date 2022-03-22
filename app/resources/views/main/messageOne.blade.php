@extends('layouts.layout')

@section('title')
    {{$rev->subject}}
@endsection

@section('main_content')
        <div class="alert alert-info">
            <p><a href="{{route('message')}}" class="button btn btn-success">Вернуться</a></p>
            <h3>{{$rev->name}}</h3>
            <b>{{$rev->subject}}</b>
            <p>{{$rev->review}}</p>
            <p>{{$rev->email}}</p>
            <p>{{$rev->created_at}}</p>
            <p><a href="{{route('messageOneUpdate', $rev->id)}}" class="button btn btn-primary">Редактировать</a></p>
            <p><a href="{{route('messageOneDelete', $rev->id)}}" class="button btn btn-danger">Удалить</a></p>
        </div>
@endsection
