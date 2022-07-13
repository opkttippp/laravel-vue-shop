<?php

namespace App\Http\Controllers;

use App\Components\SuperComponent;
use App\Facade\SuperFacade;
use App\Http\Requests\ValidRequest;
use App\Models\Review;
use App\Services\CalculateSumService;
use Illuminate\Http\Request;

class MainController extends Controller
{


    public function home(Request $request)
    {
        return view('main.home', [
            'title' => 'home',
            'date' => $request,
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
            $path = $images->storeAs(
                'images/avatar',
                $request->input('name') . '.'
                . $images->getClientOriginalExtension()
            );
            $review->avatar = $path;
        }
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
