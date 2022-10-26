@extends('layouts.layout')

@section('title')
    Product
@endsection

@section('main_content')
    <div class="container">
        <div id="app">
            <router-view></router-view>
        </div>
    </div>

@endsection

