@extends('layouts.layout')
@section('title')
    review
@endsection
@section('main_content')
    <h2>Добавить отзыв</h2>
    <div class="form-review">
        <form method="post" action="{{route('check')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject" value="{{ old('subject') }}">
            </div>
            <div class="mb-3">
                <label for="review" class="form-label">Review</label>
                <p><textarea class="form-control" type="text" id="review" name="review"
                             placeholder="Нипишите что-нибудь">{{ old('review') }}</textarea></p>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your E-mail" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Download avatar</label>
                <input type="file" class="form-control" id="image" name="image"
                       placeholder="Download your avatar">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection
