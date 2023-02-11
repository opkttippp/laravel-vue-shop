<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class IndexController extends Controller
{

    public function index(User $users)
    {
        return view('admin.index', compact('users'));
    }

//    public function show($id)
//    {
//        $environment = App::environment();
//        return view('admin.user', [
//            'id' => $id,
//            'environment' => $environment
//        ]);
//    }

}
