@extends('layouts.layout')

@section('title')
    Cart
@endsection

@section('main_content')
    <div class="col-12 card text-dark">
        <h2 class="my-5 h2 text-center">Your cart
            @if(Cart::count()==0)
                is Empty!!!
            @endif
        </h2>
        @if(Cart::count() > 0)
            <table class="table">
                <thead class="black white-text">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product</th>
                    <th scope="col">Quantity</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i = 0;
                @endphp

                @foreach(Cart::content() as $item)
                    @php
                        $i++;
                    @endphp

                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $item->name }}</td>
                        <td>
                            <form action="{{ route('cart.update') }}" method="post">
                                {!! method_field('patch') !!}
                                @csrf
                                <input type="hidden" name="productId" value="{{ $item->rowId }}">
                                <input type="number" name="qty" value="{{ $item->qty }}" min="1">
                                <button class="btn btn-sm btn-primary" type="submit">Update</button>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('cart.drop', ['productId' => $item->rowId]) }}" type="button"
                               class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="3">Total:</td>
                    <td><strong>&dollar;{{ Cart::total() }}</strong></td>
                </tr>
                </tfoot>
            </table>
        <div>
            <a href="{{ route('cart.destroy') }}" class="btn-danger btn">Clear cart</a>
            <a href="{{ route('cart.checkout') }}" class="btn-success btn">
                Checkout <i class="fa fa-arrow-right"></i>
            </a>
        </div>
        @else
            <blockquote class="blockquote dark-mode h6">
                <p class="b">Do you like our products?</p>
                <p>Your cart is empty now. You can choose product in our <a href="{{ url('catalog') }}">catalog</a> and
                    enjoy them!
                </p>
            </blockquote>
        @endif
    </div>
@endsection
