@extends('layouts.layout')

@section('title')
    Home page
@endsection

@section('main_content')

    <div class="container">

        <div id="carousel-example-2" class="carousel slide carousel-fade mb-3" data-ride="carousel">
            <!--Indicators-->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-2" data-slide-to="1"></li>
                <li data-target="#carousel-example-2" data-slide-to="2"></li>
            </ol>
            <!--/.Indicators-->
            <!--Slides-->
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="view">
                        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(68).jpg"
                             alt="First slide" style="max-height: 400px">
                        <div class="mask rgba-black-light"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive">Light mask</h3>
                        <p>First text</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(6).jpg"
                             alt="Second slide" style="max-height: 400px">
                        <div class="mask rgba-black-strong"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive">Strong mask</h3>
                        <p>Secondary text</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <!--Mask color-->
                    <div class="view">
                        <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(9).jpg"
                             alt="Third slide" style="max-height: 400px">
                        <div class="mask rgba-black-slight"></div>
                    </div>
                    <div class="carousel-caption">
                        <h3 class="h3-responsive">Slight mask</h3>
                        <p>Third text</p>
                    </div>
                </div>
            </div>
            <!--/.Slides-->
            <!--Controls-->
            <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <!--/.Controls-->
        </div>
        <!--/.Carousel Wrapper-->

        <div class="row text-sm">
            @foreach($rev as $product)
                <div class="col-md-4 d-flex align-items-stretch">
                    <div class="card flex-grow-1">
                        <div class="card-body">
                            <h5 class="d-flex justify-content-center">
                                <a href="{{ route('product.show', ['id' => $product->id]) }}">
{{--                                    {{ $product->title }}--}}
                                    {{ Str::limit($product->title, 15, ' (...)') }}

                                </a>
                            </h5>

                                <img class="rounded mx-auto d-block mt-auto" src="{{asset('storage/'.$product->image)}}" width="190"
                                     height="150" alt="tv">

                            <p>
                                <a class="d-flex justify-content-start mt-4" href="/">
                            <span class="badge
                            @if ($product->category->id == 1)
                                badge-primary
                                @elseif($product->category->id == 2)
                                badge-secondary
                                @elseif($product->category->id == 3)
                                badge-success
                                @elseif($product->category->id == 4)
                                badge-lime
                            @endif
                                ">{{ $product->category->name}}
                            </span>
                                </a>
                            </p>
                            <p class="d-flex justify-content-start fw-bold">&dollar;{{ $product->price }}</p>
                            <p class="card-text">
                                {{ Str::limit($product->description, 69, ' (...)') }}
                            </p>
                        </div>
                        <div class="card-footer">
                    <span
                        class="badge {{ $product->stock > 0 ? 'badge-success' : 'badge-danger'}}">
                    {{ $product->stock > 0 ? 'on stock' : 'not on stock'}}
                    </span>
                            <span class="float-right">
                    <a href="{{ $product->stock > 0 ? route('cart.add', ['product_id' => $product->id]) : '#' }}"
                       class="btn btn-sm btn-outline-secondary waves-effect">
                    to cart <i class="fas fa-cart-arrow-down"></i>
                    </a>
                    </span>
                        </div>
                    </div>
                </div>
            @endforeach
            @include('inc.pagin')
            <a href="{{ route('catalog.index') }}" class="btn btn-block btn-primary">To catalog</a>
        </div>

@endsection
