<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Manufactur;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchApiController extends Controller
{
    public function show(Request $request)
    {
        return Product::Where('title', 'like', '%' . $request->val . '%')
            ->limit(10)->get();
    }

    public function filter(Request $request)
    {

        $categor = $request->data['checkedNames'];
        return ProductResource::collection(
            Product::whereBetween(
                'price',
                [$request->data['priceMin'], $request->data['priceMax']])

                ->when($categor, function ($query, $categor) {
                    return $query->whereIn('category_id', $categor);
                })->paginate(3));
//            )->where('category_id', [$request->data['checkedNames']] )->paginate(3));


}
}
