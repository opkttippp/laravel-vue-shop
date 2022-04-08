<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin')->except('logout');
    }

    public function index()
    {
//        dd(Auth::guard('admin')->user());
        return view('admin.admin', ['title' => 'admin', 'text' => 'admin']);
    }
}
