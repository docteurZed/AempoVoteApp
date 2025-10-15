<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Communique;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('public.home', [
            'communiques' => Communique::all()->sortByDesc('created_at'),
        ]);
    }
}
