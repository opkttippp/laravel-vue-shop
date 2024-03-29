<?php

namespace App\Http\Controllers;

use App\Models\Gallerie;
use App\Models\Manufactur;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{
    public function index()
    {
        return view('product.index');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {

        $rev = $product->reviews;
//        $rev = Review::where('product_id', $product->id)->get();
        $status = 0;
        foreach ($rev as $r) {
            $user[] = $r->user;
            $status += $r->status;
        }
        $image = $product->galleries;
        $item = Review::where('product_id', $product->id)->count();
        if ($item) {
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
            'review' => $rev,
            'user' => $user,
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

    public function search(Request $request)
    {
        $id = Product::where('title', $request->search)->first()->id;
//        $product = Product::where('title', $request->search)->first();
//        $rev = $product->reviews;
//        $status = 0;
//        foreach ($rev as $r) {
//            $user[] = $r->user;
//            $status += $r->status;
//        }
//        $image = $product->galleries;
//        $item = $rev->count();
//        if ($item) {
//            $stars = intval(round($status / $item, 2));
//        } else {
//            $item = 0;
//            $stars = 0;
//        }
//        $category = $product->category;
//        $manufactur = $product->manufactur;
        return redirect('product#/show/' . $id);
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
