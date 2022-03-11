@extends('layout')
@section('title')
    review
@endsection
@section('main_content')
    <div class="form-review">
        <form method="post" action="/review/check">
            <div class="mb-3">
                <label for="name" class="form-label"><p>Name</p></label>
                <input type="text"  class="form-control" id="name" placeholder="Enter your Name">
            </div>

<button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
