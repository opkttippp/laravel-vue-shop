<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewApiController extends Controller
{
    public function index()
    {
        return ReviewResource::collection(Review::all());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Review::create([
            'name' => $request->name,
            'subject' => $request->subject,
            'review' => $request->review,
            'email' => $request->email ?? '',
            'user_id' => $request->user()->id ?? 4,
            'product_id' => $request->product_id,
            'status' => $request->status,
        ]);

        return response()->json('All Ok !!!');
    }

    public function show($id)
    {
        $rev = Review::where('product_id', $id)->get();
        $user = $rev->where('user_id', Auth::user()->id);

        return ([
//            'stars' => $stars,
//            'item' => $item,
            'review' => $rev,
            'user' => $user
        ]);
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
