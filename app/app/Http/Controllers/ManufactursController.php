<?php

namespace App\Http\Controllers;

use App\Models\Manufactur;
use Illuminate\Http\Request;

class ManufactursController extends Controller
{

    public function index()
    {
        $prod = Manufactur::orderBy('id', 'desc')->paginate(6);
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
