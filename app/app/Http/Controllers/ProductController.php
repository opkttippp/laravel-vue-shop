<?php

namespace App\Http\Controllers;

use App\Models\Gallerie;
use App\Models\Product;
use App\Models\Star;
use Illuminate\Http\Request;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Intervention\Image\ImageManager;

class ProductController extends Controller
{
    public function index()
    {
        $prod = Product::orderBy('created_at', 'desc')->take(12)->paginate(3);

        return view('product.index', ['rev' => $prod]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product, Star $star)
    {
//        $product = $product->find($id);
        $item = $product->stars->count();
        if ($item) {
            $status = $star->where('product_id', $product->id)->sum('status');
            $stars = intval(round($status / $item, 0));
        } else {
            $item = 0;
            $stars = 0;
        }

        $img = $product->galleries;
        return view('product.show', [
            'product' => $product,
            'image' => $img,
            'stars' => $stars,
            'item' => $item,
        ]);
    }

    public function character(Product $product)
    {
        $img = $product->galleries;
        return view('product.character', [
            'product' => $product,
            'image' => $img,
        ]);
    }

    public function search(Star $star, Request $request)
    {
        $product = Product::where('title', $request->search)->first();
        $img = $product->galleries;
        $item = $product->stars->count();
        if ($item) {
            $status = $star->where('product_id', $product->id)->sum('status');
            $stars = intval(round($status / $item, 0));
        } else {
            $item = 0;
            $stars = 0;
        }
        return view(
            'product.show',
            [
                'product' => $product,
                'image' => $img,
                'stars' => $stars,
                'item' => $item,
            ]
        );
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
