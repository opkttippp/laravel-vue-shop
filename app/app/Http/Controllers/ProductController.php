<?php

namespace App\Http\Controllers;

use App\Models\Gallerie;
use App\Models\Product;
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

    public function show(Product $product, $id)
    {
        $prod = $product->find($id);
        $img = $prod->galleries;
        return view('product.show', [
            'product' => $prod,
            'image' => $img,
        ]);
    }

    public function search(Request $request)
    {
        $product = Product::where('title', $request->search)->first();
        $img = $product->galleries;
        return view(
            'product.show',
            [
                'product' => $product,
                'image' => $img,
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
