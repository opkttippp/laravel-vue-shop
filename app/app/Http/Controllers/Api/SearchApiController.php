<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchApiController extends Controller
{
    public function show(Request $request)
    {
        $res = Product::Where('title', 'like', '%' . $request->val . '%')->limit(10)->get();
        return $res;
    }
}
