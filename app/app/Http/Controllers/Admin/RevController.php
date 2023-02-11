<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class RevController extends Controller
{
    public function index(Request $request)
    {
        $reviews = Review::all();
        return view(
            'admin.reviews.index',
            compact('reviews')
        );
    }

    public function showReview(Review $review)
    {
        return view(
            'admin.reviews.show',
            compact('review')
        );
    }


    /*    public function store(ProductFormRequest $request)
        {

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


            return redirect()->route('admin.products.index')->with(
                'status', 'Product created!'
            );
        }*/
//
//    public function update(ProductFormRequest $request, Product $product)
//    {
//
//        return redirect()->route('admin.products.index');
//    }

    public function reviewDelete(Review $review)
    {
        $review->delete();
        $reviews = Review::all();
        return redirect()->route(
            'admin.reviews.index',
            compact('reviews')
        );
    }
}
