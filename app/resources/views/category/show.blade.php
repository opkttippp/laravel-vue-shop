@extends('layouts.layout')

@section('title')
    Home page
@endsection

@section('main_content')

    <div class="container">
        @include('inc.carousel')
        <style>
            #grid {
                display: grid;
                grid-template-columns:repeat(auto-fill, minmax(240px, 1fr));
                /*grid-template-columns: 1fr 1fr 1fr;*/
                /*grid-gap: 2vw;*/
                background-color: #95999c;
            }

            #grid > div {
                font-size: 1.1vw;
                padding: .5em;
                margin: .05em;
                background: white;

            }

            #inner-grid {
                display: grid;
                grid-template-rows: 1fr 1fr;
                /*grid-gap: 5px;*/
                align-self: center;
            }

            #inner-grid-div {
                display: grid;
                grid-template-rows: 1fr 1fr 1fr 1fr;
                /*text-align: center;*/
                align-self: center;
            }

            #inner-grid > div > a > img {
                margin-top: 10%;
            }

        </style>
        <div id="grid" class="mb-3">
            @foreach($rev as $product)
                <div id="inner-grid">
                    <div style="overflow: hidden; height: 150px; ">
                        <a href="{{ route('product.show', ['id' => $product->id]) }}">
                            <img class="rounded mx-auto d-block" src="{{asset('storage/'.$product->image)}}"
                                 height="125px" alt="tv" style="width: 80%; height: 80%; object-fit: contain;">
                        </a>
                    </div>
                    <div id="inner-grid-div">
                        <div class="ml-3">
                            <a href="{{ route('product.show', ['id' => $product->id]) }}">
                                {{ $product->title }}
                            </a>
                        </div>
                        <div>
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
                        </div>
                        <div>
                            <p class="d-flex justify-content-start fw-bold">₴{{ $product->price }}</p>
                        </div>
                        <div class="card-footer">
                                <span class="badge {{ $product->stock > 0 ? 'badge-success' : 'badge-danger'}} float-left mt-2">
                                {{ $product->stock > 0 ? 'on stock' : 'not on stock'}}
                                </span>
                            <span class="float-right">
                                <a href="{{ $product->stock > 0 ? route('cart.add', ['productId' => $product->id]) : '#' }}"
                                   class="btn btn-sm btn-outline-secondary waves-effect">
                                to cart <i class="fas fa-cart-arrow-down"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        @include('inc.pagin')
        <a href="{{ route('catalog.index') }}" class="btn btn-block btn-primary">To catalog</a>
    </div>

@endsection
