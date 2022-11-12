@extends('layouts.layoutAdmin')

@section('title')
    Show
@endsection

@section('main_content')

    <div class="text-dark container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Reviews </h3>
                <div class="card-tools">
                    <div class="mt-2">
                        <a href="{{ route('admin.reviews.index') }}" class="btn btn-primary">Return</a>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive p-0">
                <table class="table table-hover align-middle" style="vertical-align: middle;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Subject</th>
                        <th>Review</th>

                    </tr>
                    </thead>
                    <tbody>

                    <tr>

                        <td>{{ $review->getKey() }}</td>
                        <td>{{ $review->name }}</td>
                        <td>{{ $review->subject }}</td>
                        <td>{{ Str::limit($review->review, 30, ' (...)') }}</td>

                        <td>
                            <div class="btn">
                                <a href="{{ route('admin.reviews.delete', ['review' => $review]) }}"
                                   class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>
@endsection
