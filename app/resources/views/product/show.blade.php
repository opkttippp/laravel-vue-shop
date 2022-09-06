@extends('layouts.layout')

@section('title')
    subject
@endsection

@section('main_content')
    <div id="app">
        <router-view :product="{{json_encode($product)}}"
                     :image="{{json_encode($image)}}"
                     :stars="{{json_encode($stars)}}"
                     :item="{{json_encode($item)}}"
                     :category="{{json_encode($category)}}"
                     :manufactur="{{json_encode($manufactur)}}">
        </router-view>
    </div>
@endsection
