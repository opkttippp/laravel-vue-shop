<?php

namespace App\Http\Controllers\AuthAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

class LogAdminController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    public function showLoginForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/admin');
        }
        return view('admin.login');
    }
    protected function guard()
    {
        return Auth::guard('admin');
    }
}
