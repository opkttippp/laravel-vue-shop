<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidRequest;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function home()
    {
        return view('main.home', [
            'title' => 'home',
            'text' => 'home'
        ]);
    }

    public function green()
    {
        return view('main.green');
    }

    public function reviewAdd()
    {
        /*        new Review();
                return view('review', ['rev' => $view->all()]);
        */
        return view('main.reviewAdd');
    }


    public function check(ValidRequest $request)
    {
        /*        $val = $request->validate([
                    'name' => 'required|min:3|max:20',
                    'subject' => 'required|min:3|max:30',
                    'review' => 'required|min:3|max:600',
                    'email' => 'max:27'
                ]);*/
        dd($request);
//        if ($request->has('name') and $request->has('review')) {
//
//            $contact = new Review();
//            $contact->name = $request->input('name');
//            $contact->subject = $request->input('subject');
//            $contact->review = $request->input('review');
//            $contact->email = $request->input('email');
//
//            $contact->save();

//            return redirect()->route('review')->with(
//                'success',
//                'Отзывы были добавлены'
//            );
//        } else {
//            return view('main.reviewAdd');
//        }
        /*        dd($request->input('review'));
                $name = DB::table('contact_modals')->select('name')->get();
                return view('review')->with(compact('name'));
        */
    }

    public function review()
    {
        $review = new Review();
        /*        return view('review', ['rev' => ContactModal::all()]);
                return view('review', ['rev' => $review->orderBy('id', 'asc')->skip(1)->take(1)->get()]);
                return view('reviewOne', ['rev' => $review->where('id', '=', $id)->get()]);
        */
        return view('main.review', ['rev' => $review->get()]);
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
