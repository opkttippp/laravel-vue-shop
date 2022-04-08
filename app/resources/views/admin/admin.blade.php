@extends('layouts.admin')

@section('title')
    {{$title}}
@endsection

@section('aside')
    @parent
    <h4 style="color: #10707f">Hello {{$title}} page!!</h4>
@endsection

@section('main_content')
    <h2 style="color: #d4edda">{{$title}} page.</h2>
@endsection
