<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class PostCotroller extends Controller
{
    public function index(Request $request, $name, $id)
    {
//        $result = User::findOrFail(3);

//        $request->session()->put('name', 'IGORCHU');
//        $data = $request->session()->all();
//        $request->session()->forget('name');
        $result = User::findOrFail(3);
//        $result = url("/posts/{$result->id}");
        return view('posts.index', ['result' => $result, 'name' => $name, 'id' => $id]);
//        return response('не найдено', '404');
//        return response('text', 200);
    }
}
