@extends('layouts.layout')
{{--@extends('layouts.nov')--}}

@section('title')
    <h2>Home Page</h2>

    @if(session())
        <div class="alert">
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        </div>
    @endif
@endsection

@section('aside')
    @parent

@endsection

@section('main_content')
{{--    <h2 style="color: #d4edda">{{ $title }} page.</h2>--}}
    @push('js')
<script>alert('hello')</script>
    @endpush
@endsection
