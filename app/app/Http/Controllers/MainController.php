<?php

namespace App\Http\Controllers;

use App\Models\ContactModal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function green()
    {
        return view('green');
    }

    public function review()
    {
        $view = new ContactModal();

        return view('review', ['rev' => $view->all()]);
    }


    public function check(Request $request)
    {
        $val = $request->validate([
            'name' => 'required|min:3|max:20',
            'subject' => 'required|min:3|max:30',
            'review' => 'required|min:3|max:600',
            'email' => 'max:27'
        ]);

        $contact = new ContactModal();

        $contact->name = $request->input('name');
        $contact->subject = $request->input('subject');
        $contact->review = $request->input('review');
        $contact->email = $request->input('email');

        $contact->save();

//        $name = DB::table('contact_modals')->select('name')->get();
//        return view('account')
//            ->with(compact('name'));

        return redirect()->route('review');
    }
}
