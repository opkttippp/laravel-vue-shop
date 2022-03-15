<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('review');
    }


    public function check(Request $request)
    {
        //        dd($request);
        $val = $request->validate([
            'email' => 'required|min:5|max:20',
            'password' => 'required|min:5|max:20'
        ]);
    }
}
