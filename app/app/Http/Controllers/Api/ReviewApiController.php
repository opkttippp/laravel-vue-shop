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
        //
    }

    public function show($id)
    {
        $rev = Review::where('product_id', $id)->get();
        $user = $rev->where('user_id', Auth::user()->id)->pluck('status');
        $status = Review::where('product_id', $id)->pluck('status')->sum();

//        $status = 0;
//        foreach ($rev as $r) {
//            $status += $r->status;
//        }

        $item = Review::where('product_id', $id)->count();
        if ($item) {
            $stars = (round($status / $item, 2));
        } else {
            $item = 0;
            $stars = 0;
        }

        return ([
            'stars' => $stars,
            'item' => $item,
            'review' => $rev,
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
