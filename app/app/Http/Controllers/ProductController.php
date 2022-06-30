<?php

namespace App\Http\Controllers;

use App\Models\Gallerie;
use App\Models\Product;
use Illuminate\Http\Request;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;


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

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
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
            'image' => $img
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product      $product
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
