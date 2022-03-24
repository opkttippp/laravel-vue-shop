@extends('layouts.layout')
@section('title')
    messageOneUpdate
@endsection
@section('main_content')
    <h2>Обновить отзыв</h2>
    <div class="form-review">
        <form method="post" action="{{route('reviewUpdate', $rev->id)}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" value="{{$rev->name}}" id="name" name="name" placeholder="Enter your Name">
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control"  value="{{$rev->subject}}" id="subject" name="subject" placeholder="Enter subject">
            </div>
            <div class="mb-3">
                <label for="review" class="form-label">Review</label>
                <p><textarea class="form-control" type="text" id="review" name="review"
                             placeholder="Нипишите что-нибудь">{{$rev->review}}</textarea></p>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" value="{{$rev->email}}" id="email" name="email" placeholder="Enter your E-mail">
            </div>
            <button type="submit" class="btn btn-success">Обновить</button>
        </form>
    </div>
@endsection
