<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $candidat = Candidat::where('user_id', Auth::user()->id)->first();

        if (! $candidat) {
            abort(403);
        }

        return view('candidate.dashboard', compact('candidat'));
    }
}
