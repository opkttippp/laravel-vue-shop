<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidRequest;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(Request $request)
    {
        return view('main.home', [
            'title' => 'home',
            'text' => 'home',
            'request' => $request
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

    public function check(ValidRequest $request)
    {
            $contact = new Review();
            $contact->name = $request->input('name');
            $contact->subject = $request->input('subject');
            $contact->review = $request->input('review');
            $contact->email = $request->input('email');

            $contact->save();

            return redirect()->route('review')->with(
                'success',
                'Отзывы были добавлены'
            );
        /*        dd($request->input('review'));
                $name = DB::table('contact_modals')->select('name')->get();
                return view('review')->with(compact('name'));
        */
    }

    public function review()
    {
        $review = new Review();
//        $review::paginate(3);
        /*        return view('review', ['rev' => ContactModal::all()]);
                return view('review', ['rev' => $review->orderBy('id', 'asc')->skip(1)->take(1)->get()]);
                return view('reviewOne', ['rev' => $review->where('id', '=', $id)->get()]);
        */
        return view('main.review', ['rev' => $review::paginate(3)]);
    }

    public function reviewOne($id)
    {
        $review = new Review();
        return view('main.reviewOne', ['rev' => $review->find($id)]);
    }

    public function reviewOneUpdate($id)
    {
        $review = new Review();
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
            'Уснешное обновление'
        );
    }

    public function reviewOneDelete($id)
    {
        Review::find($id)->delete();
        return redirect()->route('review', $id)->with(
            'success',
            'Уснешное удаление'
        );
    }
}
