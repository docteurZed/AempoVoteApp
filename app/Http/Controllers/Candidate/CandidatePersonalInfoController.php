<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use App\Models\Candidat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CandidatePersonalInfoController extends Controller
{
    public function index()
    {
        $candidat = Candidat::where('user_id', Auth::user()->id)->first();

        if (! $candidat) {
            abort(403);
        }

        return view('candidate.personal_info', compact('candidat'));
    }

    public function voteInfoEdit()
    {
        $candidat = Candidat::where('user_id', Auth::user()->id)->first();

        if (! $candidat) {
            abort(403);
        }

        return view('candidate.vote_info', compact('candidat'));
    }

    public function socialMediaEdit()
    {
        $candidat = Candidat::where('user_id', Auth::user()->id)->first();

        if (! $candidat) {
            abort(403);
        }

        return view('candidate.social_media', compact('candidat'));
    }

    public function updatePersonalInfo(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:20',
            'filiere' => 'nullable|in:medecine,pharmacie,odonto',
            'level' => 'nullable|in:l1,l2,l3,m1,m2,d1,d2,d3',
        ]);

        // ✅ Mise à jour du profil
        $user->update($validated);

        return back()->with('success', 'Vos informations ont été mises à jour avec succès.');
    }

    public function updateSocialMedia(Request $request)
    {
        $candidat = Candidat::where('user_id', Auth::user()->id)->first();

        if (! $candidat) {
            return back()->with('error', 'Aucun profil de candidat trouvé.');
        }

        $validated = $request->validate([
            'facebook' => 'nullable|url|max:255',
            'twitter'  => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'instagram'=> 'nullable|url|max:255',
        ]);

        $candidat->update($validated);

        return back()->with('success', 'Vos réseaux sociaux ont été mis à jour avec succès.');
    }

    public function updateVoteInfo(Request $request)
    {
        $candidat = Candidat::where('user_id', Auth::user()->id)->first();

        if (! $candidat) {
            return back()->with('error', 'Aucun profil de candidat trouvé.');
        }

        $validated = $request->validate([
            'slogan'     => 'nullable|string|max:255',
            'programme'  => 'nullable|string',
            'bio'        => 'nullable|string',
            'video'      => 'nullable|url|max:255',
            'photo'      => 'nullable|image|mimes:jpg,jpeg,png',
            'affiche'    => 'nullable|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('photo')) {
            
            if ($candidat->photo && Storage::disk('public')->exists($candidat->photo)) {
                Storage::disk('public')->delete($candidat->photo);
            }

            $validated['photo'] = $request->file('photo')->store('candidats/photos', 'public');
        }

        if ($request->hasFile('affiche')) {
            if ($candidat->affiche && Storage::disk('public')->exists($candidat->affiche)) {
                Storage::disk('public')->delete($candidat->affiche);
            }

            $validated['affiche'] = $request->file('affiche')->store('candidats/affiches', 'public');
        }

        $candidat->update($validated);

        return back()->with('success', 'Votre profil a été mis à jour avec succès.');
    }
}
