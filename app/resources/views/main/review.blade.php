@extends('layouts.layout')

@section('title')
    subject
@endsection

@section('main_content')
    @foreach($rev as $r)
        <div class="review">
            <h3>{{$r->name}}</h3>
            <hr>
            <b>subject - {{$r->subject}}</b>
            <hr>
            <p>review -{{$r->review}}</p>
            <hr>
            <p>email - {{$r->email}}
            @if(isset($r->updated_at))
                {{$r->updated_at}}
            @else
                {{$r->created_at}}
            @endif
            </p>
            <a href="{{route('reviewOne', $r->id)}}" class="button btn btn-primary">More ...</a>

        </div>
    @endforeach
    @include('inc.pagin')
@endsection





