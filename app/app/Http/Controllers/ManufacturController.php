<?php

namespace App\Http\Controllers;

use App\Models\Manufactur;
use Illuminate\Http\Request;

class ManufacturController extends Controller
{

    public function index()
    {
        $prod = Manufactur::orderBy('id', 'desc')->take(12)->paginate(3);

        return view('manufactur.index', ['rev' => $prod]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Manufactur $manufactur)
    {
        //
    }

    public function edit(Manufactur $manufactur)
    {
        //
    }

    public function update(Request $request, Manufactur $manufactur)
    {
        //
    }

    public function destroy(Manufactur $manufactur)
    {
        //
    }
}
