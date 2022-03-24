@extends('layouts.layout')

@section('title')
    subject
@endsection

@section('main_content')
    @foreach($rev as $r)
        <div class="alert alert-info">
            <h3>{{$r->name}}</h3>
            <b>{{$r->subject}}</b>
            <p>{{$r->review}}</p>
            <p>{{$r->email}}</p>
            @if(isset($r->updated_at))
                <p>{{$r->updated_at}}</p>
            @else
                <p>{{$r->created_at}}</p>
            @endif
            <a href="{{route('reviewOne', $r->id)}}" class="button btn btn-primary">Детальнее ...</a>
        </div>
    @endforeach
@endsection





