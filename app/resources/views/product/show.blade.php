@extends('layouts.layout')

@section('title')
    subject
@endsection

@section('main_content')
    <style>
        /*#grid {*/
        /*    display: grid;*/
        /*    grid-template-columns:repeat(auto-fill, minmax(25%, 1fr));*/
        /*    !*align-self: center;*!*/
        /*    !*grid-template-rows: 400px;*!*/
        /*    !*grid-gap: 2vw;*!*/
        /*    !*background-color: #95999c;*!*/
        /*}*/

        /*#grid > img {*/
        /*    font-size: 1.1vw;*/
        /*    !*padding: .5em;*!*/
        /*    !*margin: .05em;*!*/
        /*    background: white;*/
        /*    !*box-shadow: 0 0 0 1px darkgrey;*!*/
        /*    !*align-self: center;*!*/
        /*}*/
    </style>
    {{--    <div class="container dark-grey-text mt-0">--}}
    {{--        <div class="card">--}}
    {{--            <div class="col-12 mt-1 mb-1">--}}
    {{--                <p class="product_title">{{ $product->title }}</p>--}}
    {{--            </div>--}}
    {{--            <div class="col-12">--}}
    {{--                <ul class="menu-product d-flex justify-content-around">--}}
    {{--                    <li class="nav-item">--}}
    {{--                        <a class="nav-link menu-product-active" href="{{ route('product.show', ['product' => $product]) }}">Все о товаре</a>--}}
    {{--                    </li>--}}
    {{--                    <li class="nav-item">--}}
    {{--                        <a class="nav-link" href='{{ route('product.character', ['product' => $product]) }}'>Характеристики</a>--}}
    {{--                    </li>--}}
    {{--                    <li class="nav-item">--}}
    {{--                        <a class="nav-link" href='#'>Отзывы</a>--}}
    {{--                    </li>--}}
    {{--                    <li class="nav-item">--}}
    {{--                        <a class="nav-link" href='#'>Задать вопрос</a>--}}
    {{--                    </li>--}}
    {{--                    <li class="nav-item">--}}
    {{--                        <a class="nav-link" href='#'>Фото</a>--}}
    {{--                    </li>--}}
    {{--                </ul>--}}
    {{--            </div>--}}
    {{--            <!--Grid row-->--}}
    {{--            <div class="row">--}}
    {{--                <!--Grid column-->--}}

    {{--                <div class="col-6">--}}
    {{--                    <div class="row col-12 m-2 align-items-center one ml-4" style="overflow: hidden; height: 400px;">--}}
    {{--                        <img src="{{asset('storage/'.$product->image)}}"--}}
    {{--                             alt="Main image"--}}
    {{--                             style="width: 80%; height: 80%; object-fit: contain; justify-content: center;">--}}
    {{--                    </div>--}}
    {{--                    <div id="grid" style="cursor: pointer; margin-left: 20px;">--}}
    {{--                        @foreach($image as $img)--}}
    {{--                            <img class="many p-2" src="{{asset('storage/'.$img->photos)}}" height="80%" width="80%"--}}
    {{--                                 alt="image">--}}
    {{--                        @endforeach--}}
    {{--                    </div>--}}
    {{--                </div>--}}


    {{--                <div class="col-md-6 mb-4">--}}
    {{--                    <div class="d-flex justify-content-start">--}}
    {{--                        <div class="rating-area">--}}
    {{--                                                        @for($i = 5; $i > 0; $i--)--}}
    {{--                                                        <input type="radio" id="star-{{$i}}" name="rating" value="{{$i}}" checked>--}}
    {{--                                                        <label for="star-{{$i}}" title="Оценка {{$i}}"></label>--}}
    {{--                                                        @endfor--}}
{{--                                    <svg style="width: 0; height: 0;" xmlns="http://www.w3.org/2000/svg"--}}
{{--                                         viewBox="0 0 32 32">--}}
{{--                                        <defs>--}}
{{--                                            <mask id="half">--}}
{{--                                                <rect x="0" y="0" width="32" height="32" fill="white"/>--}}
{{--                                                <rect x="50%" y="0" width="32" height="32" fill="grey"/>--}}
{{--                                            </mask>--}}

{{--                                            <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" id="star">--}}
{{--                                                <path--}}
{{--                                                    d="M31.547 12a.848.848 0 00-.677-.577l-9.427-1.376-4.224-8.532a.847.847 0 00-1.516 0l-4.218 8.534-9.427 1.355a.847.847 0 00-.467 1.467l6.823 6.664-1.612 9.375a.847.847 0 001.23.893l8.428-4.434 8.432 4.432a.847.847 0 001.229-.894l-1.615-9.373 6.822-6.665a.845.845 0 00.214-.869z"/>--}}
{{--                                            </symbol>--}}
{{--                                        </defs>--}}
{{--                                    </svg>--}}

    {{--                            <div class="star-rating" aria-label="4.5 stars out of 5">--}}

    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                        <div class="stars d-flex justify-content-center align-items-center ml-4">--}}
    {{--                            <b id="grade">{{$stars}}</b>&nbsp;({{$item}}&nbsp;оценок)--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                    <div class="mb-3">--}}
    {{--                        <a class="d-flex justify-content-start mt-4"--}}
    {{--                           href="{{ route('category.show',['category' => $product->category_id]) }}">--}}
    {{--                                <span class="col-3 text-lg badge--}}
    {{--                                    @if ($product->category->id == 1)--}}
    {{--                                    badge-primary--}}
    {{--                                    @elseif($product->category->id == 2)--}}
    {{--                                    badge-secondary--}}
    {{--                                    @elseif($product->category->id == 3)--}}
    {{--                                    badge-success--}}
    {{--                                    @elseif($product->category->id == 4)--}}
    {{--                                    badge-lime--}}
    {{--                                    @endif--}}
    {{--                                    ">{{ $product->category->name}}--}}
    {{--                                </span>--}}
    {{--                        </a>--}}
    {{--                    </div>--}}
    {{--                    <p class="lead">--}}
    {{--                        <span class="mr-1"></span>--}}
    {{--                        <span>₴{{ $product->price }}</span>--}}
    {{--                    </p>--}}
    {{--                    <p class="lead font-weight-bold">Description</p>--}}
    {{--                    <p>--}}
    {{--                        {{ Str::limit($product->description, 190, ' (...)') }}--}}
    {{--                    </p>--}}

    {{--                    <p class="lead font-weight-bold">Manufactur</p>--}}
    {{--                    <p>--}}
    {{--                        {{ $product->manufactur->name}} - {{ $product->manufactur->country}}--}}
    {{--                    </p>--}}

    {{--                    <!--Content-->--}}

    {{--                </div>--}}
    {{--                <!--Grid column-->--}}

    {{--            </div>--}}
    {{--            <!--Grid row-->--}}

    {{--            <hr>--}}

    {{--            <!--Grid row-->--}}
    {{--            <div class="row d-flex justify-content-center">--}}

    {{--                <!--Grid column-->--}}
    {{--                <div class="col-md-6 text-center">--}}

    {{--                    <h4 class="my-4 h4">Additional information</h4>--}}

    {{--                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta--}}
    {{--                        odit voluptates,--}}
    {{--                        quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>--}}

    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="row">--}}

    {{--                <!--Grid column-->--}}
    {{--                <div class="col-lg-4 col-md-12 mb-4">--}}

    {{--                    <img src="{{asset('images/product_footer_1.jpg')}}" class="img-fluid"--}}
    {{--                         alt="">--}}

    {{--                </div>--}}
    {{--                <!--Grid column-->--}}

    {{--                <!--Grid column-->--}}
    {{--                <div class="col-lg-4 col-md-6 mb-4">--}}

    {{--                    <img src="{{asset('images/product_footer_2.jpg')}}" class="img-fluid"--}}
    {{--                         alt="">--}}

    {{--                </div>--}}
    {{--                <!--Grid column-->--}}

    {{--                <!--Grid column-->--}}
    {{--                <div class="col-lg-4 col-md-6 mb-4">--}}

    {{--                    <img src="{{asset('images/product_footer_3.jpg')}}" class="img-fluid"--}}
    {{--                         alt="">--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--        <script type="text/javascript">--}}
{{--                document.addEventListener('DOMContentLoaded', function () {--}}
    {{--    // --------------------------------------star-raiting------------------------------------}}
{{--                    let grade = document.querySelector('#grade').textContent;--}}
{{--                    const star_rating = document.querySelector('.star-rating');--}}

{{--                    let output = '';--}}
{{--                    for (let i = 5; i > 0; i--, grade--) {--}}
{{--                        if (grade > 0) {--}}
{{--                            let svg = '<svg class="c-star active" width="32" height="32" viewBox="0 0 32 32">' +--}}
{{--                                '<use xlink:href="#star"></use>' +--}}
{{--                                '<use xlink:href="#star" fill="none" stroke="grey"></use>' +--}}
{{--                                '</svg>';--}}
{{--                            output += svg;--}}
{{--                        } else {--}}
{{--                            let svg = '<svg class="c-star inactive" width="32" height="32" viewBox="0 0 32 32">' +--}}
{{--                                '<use xlink:href="#star"></use>' +--}}
{{--                                '<use xlink:href="#star" fill="none" stroke="grey"></use>' +--}}
{{--                                '</svg>';--}}
{{--                            output += svg;--}}
{{--                        }--}}
{{--                        star_rating.innerHTML = output;--}}

{{--                    }--}}
    {{--    //--------------------------------------Image-----------------------------------------}}
    {{--                const one = document.querySelector('.one');--}}
    {{--                let div = document.querySelectorAll(".many");--}}
    {{--                div.forEach(n => {--}}
    {{--                    addEventListener("click", function (e) {--}}
    {{--                        if (e.target.src) {--}}
    {{--                            div.forEach(n => {--}}
    {{--                                n.style.border = 'none';--}}
    {{--                            });--}}
    {{--                            e.target.style = 'border:1px solid green';--}}
    {{--                            const action = e.target.src;--}}
    {{--                            const img = new Image();--}}
    {{--                            img.src = action;--}}
    {{--                            img.style = 'width: 80%; height: 80%; object-fit: contain;';--}}
    {{--                            one.innerHTML = '';--}}
    {{--                            one.append(img);--}}
    {{--                        }--}}
    {{--                    });--}}
    {{--                });--}}

    {{--    //------------------------------------menu-product----------------------------------}}
    {{--    //             let menu = document.querySelectorAll(".menu");--}}
    {{--    //             console.log(menu);--}}
    {{--    //             menu.forEach(n => {--}}
    {{--    //                 addEventListener("click", function (e) {--}}
    {{--    //                     menu.forEach(n => {--}}
    {{--    //                         n.style.color = 'rgb(22, 20, 33)';--}}
    {{--    //                     });--}}
    {{--    //                         e.target.style = 'color: #00b44e;';--}}
    {{--    //                 });--}}
    {{--    //             });--}}
    {{--    //----------------------------------------------------------------------------------}}

    {{--            });--}}
    {{--        </script>--}}

    <div id="app">
        <router-view :product="{{json_encode($product)}}"
                     :image="{{json_encode($image)}}"
                     :stars="{{json_encode($stars)}}"
                     :item="{{json_encode($item)}}"
                     :category="{{json_encode($category)}}"
                     :manufactur="{{json_encode($manufactur)}}">
        </router-view>
    </div>

@endsection
