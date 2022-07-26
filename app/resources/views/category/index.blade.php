@extends('layouts.layout')

@section('title')
    Category
@endsection

@section('main_content')

    <div class="container">
        <style>
            #grid {
                display: grid;
                grid-template-columns:repeat(auto-fill, minmax(250px, 1fr));
            }

            #grid > div {
                font-size: 1.1vw;
                padding: .5em;
                background: white;
                box-shadow: 0 0 0 1px darkgrey;
            }


        </style>
        <div id="grid">
            @foreach($rev as $category)

                    <div style="overflow: hidden; height: 150px;" class="float-left">
                        <a href="{{ route('category.show', ['id' => $category->id]) }}">
                        <img class="rounded mx-auto d-block" src="{{asset('storage/'.$category->image)}}"
                                 height="125px" alt="tv" style="width: 80%; height: 80%; object-fit: contain;">
                        {{ $category->name }}
                        </a>
                    </div>
            @endforeach
        </div>
        @include('inc.pagin')
    </div>

@endsection
