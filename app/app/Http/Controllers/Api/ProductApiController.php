<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductApiController extends Controller
{
    public function index(Request $request)
    {

        $this->middleware("auth");
        return ProductResource::collection(Product::paginate(3));
//        return ProductResource::collection(Product::paginate(3, ['*'], 'page', $request['page']));
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
//        return new ProductResource($product);
        return ProductResource::collection(Product::Where('id', $product->id)->paginate(1));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
