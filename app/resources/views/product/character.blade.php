@extends('layouts.layout')

@section('title')
    subject
@endsection

@section('main_content')
    <div class="container dark-grey-text mt-0">
        <div class="card">
            <div class="col-12 mt-1 mb-1">
                <p class="product_title">{{ $product->title }}</p>
            </div>
            <div class="col-12">
                <ul class="menu-product d-flex justify-content-around">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('product.show', ['product' => $product]) }}">Все о товаре</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-product-active"
                           href='{{ route('product.character', ['product' => $product]) }}'>Характеристики</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='#'>Отзывы</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='#'>Задать вопрос</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href='#'>Фото</a>
                    </li>
                </ul>
            </div>
            <div class="row d-flex p-3 justify-content-center">
                <span>{{$product->description}}</span>
            </div>
            <div class="row d-flex justify-content-center">

                <!--Grid column-->
                <div class="col-md-6 text-center">

                    <h4 class="my-4 h4">Additional information</h4>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta
                        odit voluptates,
                        quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>

                </div>

            </div>
        </div>
@endsection
