<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\Election;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $election = Election::first();

        $hasVoted = $user->hasVoted(optional($election)->id);

        $votes = $hasVoted
            ? $user->votes()->forElection(optional($election)->id)->get()->keyBy('poste')
            : collect();

        $candidats = Candidat::where('election_id', optional($election)->id)
            ->where('statut', 'valide')
            ->get()
            ->groupBy('poste');

        return view('member.vote', compact('candidats', 'votes', 'election', 'hasVoted'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $election = Election::first();

        if ($user->hasVoted(optional($election)->id)) {
            return redirect()->back()->with('error', 'Vous avez déjà soumis vos votes.');
        }

        $request->validate([
            'vote' => 'required|array',
        ]);

        foreach ($request->vote as $poste => $candidat_id) {
            Vote::create([
                'election_id' => $election->id,
                'user_id' => $user->id,
                'candidat_id' => $candidat_id,
                'poste' => $poste,
            ]);
        }

        return redirect()->route('member.vote')->with('success', 'Vos votes ont été enregistrés avec succès.');
    }
}
