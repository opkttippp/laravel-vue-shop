<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewApiController extends Controller
{

    public function index()
    {
        return 'Ok';
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
        $status = 0;
        foreach ($rev as $r) {
            $user[] = $r->user;
            $status += $r->status;
        }

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
            'review' => $rev
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
