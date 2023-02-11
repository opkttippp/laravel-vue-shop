@extends('layouts.app')

@section('main_content')
    <div id="app">
        <nav-bar></nav-bar>


        <cart-modal></cart-modal>
{{--        <search-modal></search-modal>--}}

        <router-view></router-view>
        <footer-site></footer-site>
    </div>
@endsection
