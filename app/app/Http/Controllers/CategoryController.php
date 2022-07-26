<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $prod = Category::orderBy('created_at', 'desc')->take(12)->paginate(3);

        return view('category.index', ['rev' => $prod]);
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
        $prod = Product::orderBy('created_at', 'desc')->where('category_id', $id)->take(12)->paginate(3);
        return view('product.index', ['rev' => $prod]);
    }

    public function edit(Category $category)
    {
        //
    }

    public function update(Request $request, Category $category)
    {
        //
    }

    public function destroy(Category $category)
    {
        //
    }
}
