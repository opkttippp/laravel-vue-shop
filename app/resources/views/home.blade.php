@extends('layouts.app')

@section('main_content')
    <div id="app">
        <nav-bar></nav-bar>
        <cart-modal></cart-modal>
        <router-view></router-view>
        <footer-site></footer-site>
    </div>
@endsection

