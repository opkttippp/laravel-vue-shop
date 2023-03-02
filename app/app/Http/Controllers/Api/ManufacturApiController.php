<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Manufactur;
use Illuminate\Http\Request;

class ManufacturApiController extends Controller
{
    public function index()
    {
        return Manufactur::all();
    }
}
