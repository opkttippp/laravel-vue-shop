@extends('layouts.layout')

@section('title')
    Category
@endsection

@section('main_content')

    <div class="container">
        <style>
            #grid {
                display: grid;
                grid-template-columns:repeat(auto-fill, minmax(40%, 1fr));
            }

            #grid > div {
                font-size: 1.1vw;
                padding: .5em;
                background: white;
                box-shadow: 0 0 0 1px darkgrey;
            }


        </style>
        <div id="grid">
            @foreach($rev as $manufactor)

                <div>
                        {{ $manufactor->name }}
                </div>
                <div>
                    {{ $manufactor->country }}
                </div>
            @endforeach
        </div>
        @include('inc.pagin')
    </div>

@endsection
