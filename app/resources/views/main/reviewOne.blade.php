@extends('layouts.layout')

@section('title')
    {{$rev->subject}}
@endsection

@section('main_content')
    <div class="message alert alert-info">
        <p><a href="{{route('review')}}" class="button btn btn-success">Вернуться</a></p>
        <h3>{{$rev->name}}</h3>
        <b>{{$rev->subject}}</b>
        <p>{{$rev->review}}</p>
        <p>{{$rev->email}}</p>
        @if(isset($rev->updated_at))
            <p>{{$rev->updated_at}}</p>
        @else
            <p>{{$rev->created_at}}</p>
        @endif
        <p><a href="{{route('reviewOneUpdate', $rev->id)}}" class="button btn btn-primary">Редактировать</a></p>
        <p><a href="{{route('reviewOneDelete', $rev->id)}}" class="button btn btn-danger">Удалить</a></p>
    </div>
@endsection