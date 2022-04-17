@extends('layouts.layout')

@section('title')
    {{$rev->subject}}
@endsection

@section('main_content')
    <div class="review">
        <p><a href="{{route('review')}}" class="button btn btn-success">Return</a></p>
        <h3>{{$rev->name}}</h3>
        <b>{{$rev->subject}}</b>
        <p>{{$rev->review}}</p>
        <p>{{$rev->email}}</p>
        @if(isset($rev->updated_at))
            <p>{{$rev->updated_at}}</p>
        @else
            <p>{{$rev->created_at}}</p>
        @endif
        @if(auth()->user()->can('edit post'))
            <p><a href="{{route('reviewOneUpdate', $rev->id)}}" class="button btn btn-primary">Edit</a></p>
        @endif
        @if(auth()->user()->can('delete post'))
            <p><a href="{{route('reviewOneDelete', $rev->id)}}" class="button btn btn-danger">Delete</a></p>
        @endif
    </div>
@endsection
