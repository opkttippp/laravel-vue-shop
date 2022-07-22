<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Category;
use App\Models\Gallerie;
use App\Models\Manufactur;
use App\Models\Product;

class ProdController extends Controller
{
    public function index()
    {
        $products = Product::with(['category'])->paginate();
        $trashedProducts = Product::onlyTrashed()->get();

        return view(
            'admin.products.index',
            compact('products', 'trashedProducts')
        );
    }

    public function create()
    {
        //-------------------list categories-------------------------------------
        $categories = Category::all();
        $categories = $categories->pluck('name', 'id');
        $productCategories = [];
        //-------------------list manufactur-------------------------------------
        $manufactur = Manufactur::all();
        $manufactur = $manufactur->pluck('name', 'id');
        $productManufactur = [];

        return view(
            'admin.products.create',
            compact(
                'categories',
                'productCategories',
                'manufactur',
                'productManufactur'
            )
        );
    }

    public function store(ProductFormRequest $request)
    {
        //--------------------------------Main image----------------------------

        if ($request->has('image')) {
            $file = $request->file('image');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $file->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extention;
            $path = $file->storeAs(
                'public/images/product',
                $fileNameToStore
            );
        }
        $date = $request->all();
        $date['image'] = $path ?? null;
        $model = Product::create($date);

        //-------------------------------Many images----------------------------

        if ($request->has('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extention = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extention;
                $path = $file->storeAs(
                    'public/images/product',
                    $fileNameToStore
                );
                $images[] = $path;
            }
        }
        foreach ($images as $image) {
            Gallerie::create([
                'photos' => $image,
                'product_id' => $model->id,
            ]);
        }
        //-----------------------------------------------------------------------

        return redirect()->route('admin.products.index');
    }

    public function edit(Product $product)
    {
        //-------------------list categories-------------------------------------
        $categories = Category::all();
        $categories = $categories->pluck('name', 'id');
        $productCategories = $product->category()->pluck('id');
        //-------------------list manufactur-------------------------------------
        $manufactur = Manufactur::all();
        $manufactur = $manufactur->pluck('name', 'id');
        $productManufactur = $product->manufactur()->pluck('id');

        $galleries = $product->galleries()->get();

        return view(
            'admin.products.edit',
            compact(
                'product',
                'categories',
                'productCategories',
                'manufactur',
                'productManufactur',
                'galleries'
            )
        );
    }

    public function update(ProductFormRequest $request, Product $product)
    {
        //--------------------------------Main image-------------------------------
        if ($request->has('image')) {
            $file = $request->file('image');
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extention = $file->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extention;
            $path = $file->storeAs(
                'public/images/product',
                $fileNameToStore
            );
        }
        $date = $request->all();

        $date['image'] = $path ?? $product->image;

        //-------------------------------Many images-------------------------------

        if ($request->has('images')) {
            $files = $request->file('images');
            foreach ($files as $file) {
                $filenameWithExt = $file->getClientOriginalName();
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extention = $file->getClientOriginalExtension();
                $fileNameToStore = $filename . '_' . time() . '.' . $extention;
                $path = $file->storeAs(
                    'public/images/product',
                    $fileNameToStore
                );

                $images[] = $path;
            }
            $product->galleries()->forceDelete();
            foreach ($images as $image) {
                Gallerie::create([
                    'photos' => $image,
                    'product_id' => $product->id,
                ]);
            }
        }
        $product->update($date);
        return redirect()->route('admin.products.index');
    }

    public function delete(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index');
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->whereId($id)->first();
        $product->restore();

        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $product = Product::onlyTrashed()->whereId($id)->first();
        //--------------------------CASCADE Delete-----------------------------
//        $product->galleries()->forceDelete();
        $product->forceDelete();

        return redirect()->route('admin.products.index');
    }
}
