@extends('layouts.layout')

@section('title')
    subject
@endsection

@section('main_content')
    <div class="container dark-grey-text mt-0">
        <div class="col-12 mb-xl-5 display-6">
            {{ $product->title }}
        </div>
        <!--Grid row-->
        <div class="row text-sm">
            <!--Grid column-->

            <div class="col-6 align-items-sm-start">
                <div class="row">
                    <div class="col-12">
                        <img src="{{asset($product->image)}}" class="img-fluid img-thumbnail" alt="Main image">
                    </div>
                </div>
                <div class="row mt-2">
                    @foreach($image as $img)
                        <div class="col-3">
                            <img src="{{asset($img->photos)}}" height="100%" width="100%" alt="image">
                        </div>
                    @endforeach
                </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-6 mb-4">
                <div class="">
                    <div class="mb-3">
                        <a class="d-flex justify-content-start mt-4" href="{{url("/product")}}">
                      <span class="col-3 text-lg badge
                    @if ($product->categories->id == 1)
                          badge-primary
                    @elseif($product->categories->id == 2)
                          badge-secondary
                    @elseif($product->categories->id == 3)
                          badge-success
                    @elseif($product->categories->id == 4)
                          badge-lime
                    @endif
                          ">{{ $product->categories->name}}
                    </span>
                        </a>
                    </div>
                    <p class="lead">
                        <span class="mr-1"></span>
                        <span>${{ $product->price }}</span>
                    </p>
                    <p class="lead font-weight-bold">Description</p>
                    <p>
                        {{ Str::limit($product->description, 190, ' (...)') }}
                    </p>
                </div>
                <!--Content-->

            </div>
            <!--Grid column-->

        </div>
        <!--Grid row-->

        <hr>

        <!--Grid row-->
        <div class="row d-flex justify-content-center">

            <!--Grid column-->
            <div class="col-md-6 text-center">

                <h4 class="my-4 h4">Additional information</h4>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta
                    odit voluptates,
                    quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>

            </div>
        </div>
        <div class="row">

            <!--Grid column-->
            <div class="col-lg-4 col-md-12 mb-4">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/11.jpg" class="img-fluid"
                     alt="">

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/12.jpg" class="img-fluid"
                     alt="">

            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-4 col-md-6 mb-4">

                <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/13.jpg" class="img-fluid"
                     alt="">
            </div>
        </div>
    </div>

@endsection
