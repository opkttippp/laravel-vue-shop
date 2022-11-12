@extends('layouts.layout')

@section('title')
    Manufactur
@endsection

@section('main_content')
    <div class="container">
        <div class="d-flex align-content-around flex-wrap" style="cursor: pointer;">
            @foreach($rev as $manufactur)
                <div class="d-flex flex-column justify-content-center m-3 p-3 col-3"
                     style="overflow: hidden; background-color: white; border-radius: 3%;">
                    <img class="img-fluid rounded-1;" src="{{asset('storage/'.$manufactur->image)}}" alt="tv"
                         style="object-fit: contain; padding: 5px; height: 80px;"
                    >
                    <p style="text-align:center;">{{ $manufactur->name }}</p>
                    <p style="text-align:center;">{{ $manufactur->country }}</p>
                </div>
            @endforeach
        </div>
        @include('inc.pagin')
    </div>
@endsection
