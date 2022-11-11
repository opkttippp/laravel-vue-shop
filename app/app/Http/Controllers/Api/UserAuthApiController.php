<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserAuthApiController extends Controller
{
    public function index()
    {
        $this->middleware("auth");
        return User::where('id', Auth::user()->id)->first();
    }
}
