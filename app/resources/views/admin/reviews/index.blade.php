@extends('layouts.layoutAdmin')

@section('title')
    Reviews
@endsection

@section('main_content')

    <div class="text-dark container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"> Reviews </h3>
                <div class="card-tools">
                    {{--                    <div class="mt-2">--}}
                    {{--                        <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Create</a>--}}
                    {{--                    </div>--}}
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
                        <th>Title</th>
                        <th>Image</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($reviews as $review)
                            <tr>

                                <td>{{ $review->getKey() }}</td>
                                <td>{{ $review->name }}</td>
                                <td>{{ $review->subject }}</td>
                                <td>{{ $review->review }}</td>
                                <td>
                                    <a href="{{ route('admin.reviews.show', ['review' => $review ])}}">
                                    {{ Str::limit($review->product->title, 30, ' (...)') }}
                                    </a>
                                </td>
                                <td style="height: 70px; width: 70px;">
                                    <img src="{{asset('storage/'.$review->product->image)}}" alt="image"
                                         style="width: 80%; height: 80%; object-fit: contain; margin: 10px;">
                                </td>

                                {{--                                <td>--}}
                                {{--                                    <div class="btn-group">--}}
                                {{--                                        <a href="{{ route('admin.products.edit', ['product' => $product->getKey()]) }}"--}}
                                {{--                                           class="btn btn-warning">Edit</a>--}}
                                {{--                                        <a href="{{ route('admin.products.delete', ['product' => $product->getKey()]) }}"--}}
                                {{--                                           class="btn btn-danger">Delete</a>--}}
                                {{--                                    </div>--}}
                                {{--                                </td>--}}
                            </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{--        <div class="d-flex justify-content-center">--}}
        {{--            {{ $products->links() }}--}}
        {{--        </div>--}}
    </div>

@endsection

