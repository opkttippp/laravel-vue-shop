@extends('layouts.layout')

@section('title')
    review
@endsection
@section('main_content')
    <form method="post" action="{{route('posts')}}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name">
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject">
        </div>
        <div class="mb-3">
            <label for="review" class="form-label">Review</label>
            <p><textarea class="form-control" type="text" id="review" name="review"
                         placeholder="Нипишите что-нибудь"></textarea></p>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your E-mail">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
