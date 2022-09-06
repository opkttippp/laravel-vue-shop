<?php

namespace App\Http\Controllers;

use App\Models\Gallerie;
use App\Models\Manufactur;
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
        $image = $product->galleries;
        $item = $product->stars->count();
        if ($item) {
            $status = $star->where('product_id', $product->id)->sum('status');
            $stars = (round($status / $item, 2));
        } else {
            $item = 0;
            $stars = 0;
        }
        $category = $product->category;
        $manufactur = $product->manufactur;

        return view('product.show', [
            'product' => $product,
            'image' => $image,
            'stars' => $stars,
            'item' => $item,
            'category' => $category,
            'manufactur' => $manufactur,
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
        $image = $product->galleries;
        $item = $product->stars->count();
        if ($item) {
            $status = $star->where('product_id', $product->id)->sum('status');
            $stars = intval(round($status / $item, 0));
        } else {
            $item = 0;
            $stars = 0;
        }
        $category = $product->category;
        $manufactur = $product->manufactur;
        return view('product.show', [
            'product' => $product,
            'image' => $image,
            'stars' => $stars,
            'item' => $item,
            'category' => $category,
            'manufactur' => $manufactur,
        ]);
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
