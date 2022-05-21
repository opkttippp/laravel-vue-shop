<?php

namespace App\Http\Controllers;

use App\Contracts\Video\VideoHosting;
use App\Http\Requests\ValidRequest;
use App\Models\Review;
use App\Services\CalculateSumService;
use App\Services\OneService;
use App\Services\Video\Youtube;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MainController extends Controller
{

//    public function home(VideoHosting $hosting)
    public function home(Request $request, CalculateSumService $service)
    {
        /*        session(['num' => 547]);
                $request->session()->increment('num');
                $data = $request->session()->all();
        */
        //        return view('main.home', [
//            'title' => 'home',
//            'text' => $data,
//            'array' => [
//                1 => 'one',
//                2 => 'two',
//                3 => 'three'
//            ],
//        ]);
//        dd($service->start($request->all(), 'minus'));

        return view('main.home', [
            'title' => 'home',
            'date' => $request,
//            'service' => App::makeWith(OneService::class, ['token' => 'token2']),
        ]);
    }

    public function green()
    {
        return view('main.green');
    }


    public function reviewAdd()
    {
        return view('main.reviewAdd');
    }

    public function check(Review $review, ValidRequest $request)
    {

        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $path = $images->storeAs('images/avatar', $request->input('name').'.'.$images->getClientOriginalExtension());
            $review->avatar = $path;
        }
//        dd($images);
        $review->name = $request->input('name');
        $review->subject = $request->input('subject');
        $review->review = $request->input('review');
        $review->email = $request->input('email');

        $review->save();

        return redirect()->route('review')->with(
            'success',
            'Отзывы были добавлены'
        );
    }

    public function review(Review $review)
    {
        //        $review = new Review();
        return view('main.review', ['rev' => $review::paginate(3)]);
    }

    public function reviewOne(Review $review, $id)
    {
        return view('main.reviewOne', ['rev' => $review->find($id)]);
    }

    public function reviewOneUpdate(Review $review, $id)
    {
        return view('main.reviewOneUpdate', ['rev' => $review->find($id)]);
    }

    public function reviewUpdate($id, ValidRequest $request)
    {
        $contact = Review::find($id);

        $contact->name = $request->input('name');
        $contact->subject = $request->input('subject');
        $contact->review = $request->input('review');
        $contact->email = $request->input('email');
        $contact->save();
        return redirect()->route('reviewOne', $id)->with(
            'success',
            'Success edit'
        );
    }

    public function reviewOneDelete($id)
    {
        Review::find($id)->delete();
        return redirect()->route('review')->with(
            'success',
            'Success delete'
        );
    }
}
