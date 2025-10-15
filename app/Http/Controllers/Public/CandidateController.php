<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function index()
    {
        return view('public.candidate', [
            'candidats' => Candidat::with('user')
            ->where('statut', 'valide')
            ->get()
            ->groupBy('poste'),
        ]);
    }

    public function show(int $id)
    {
        return view('public.candidate-detail', [
            'candidat' => Candidat::with('user')->findOrFail($id),
        ]);
    }
}
