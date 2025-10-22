@extends('partials.candidate.base')

@section('content')
    <section class="max-w-4xl mx-auto mt-16 p-8 bg-gray-800/40 border border-gray-700 rounded-xl shadow-lg">
        <h2 class="text-3xl font-bold text-center text-red-600 mb-8">Tableau de bord</h2>

        <div class="bg-gray-700/50 p-6 rounded-lg border border-gray-600 mb-8">
            @php
                $posteLabels = [
                    'president' => 'Président',
                    'vpi' => 'Vice-Président aux affaires internes',
                    'vpe' => 'Vice-Président aux affaires externes',
                    'secretaire' => 'Secrétaire',
                    'tresorier' => 'Trésorier',
                    'scome' => 'Responsable SCOME',
                    'scope' => 'Responsable SCOPE',
                    'score' => 'Responsable SCORE',
                    'scora' => 'Responsable SCORA',
                    'scoph' => 'Responsable SCOPH',
                    'scohe' => 'Responsable SCOHE',
                    'communication' => 'Chargé de Communication',
                    'sport' => 'Chargé des activités culturelles et Sportives',
                ];

                $statutLabels = [
                    'en_attente' => 'En attente',
                    'valide' => 'Validé',
                    'rejete' => 'Rejeté',
                ];
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <h4 class="text-green-400 font-semibold">Poste</h4>
                    <p class="text-white">{{ $posteLabels[$candidat->poste] ?? 'Non défini' }}</p>
                </div>
                <div>
                    <h4 class="text-green-400 font-semibold">Statut :</h4>
                    <p class="text-red-600">{{ $statutLabels[$candidat->statut] ?? 'Non défini' }}</p>
                </div>
            </div>
        </div>

        {{-- Informations générales --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-4">
                <div>
                    <h3 class="text-lg font-semibold text-green-500">Nom du candidat</h3>
                    <p class="text-white">{{ $candidat->user->name }}</p>
                </div>
                @if ($candidat->slogan)
                    <div>
                        <h3 class="text-lg font-semibold text-green-500">Slogan</h3>
                        <p class="text-white">{{ $candidat->slogan }}</p>
                    </div>
                @endif
                @if ($candidat->programme)
                    <div>
                        <h3 class="text-lg font-semibold text-green-500">Programme</h3>
                        <div class="text-white">{!! $candidat->programme !!}</div>
                    </div>
                @endif
                @if ($candidat->bio)
                    <div>
                        <h3 class="text-lg font-semibold text-green-500">Biographie</h3>
                        <p class="text-white whitespace-pre-line">{{ $candidat->bio }}</p>
                    </div>
                @endif
            </div>

            {{-- Images --}}
            <div class="space-y-4 flex flex-col items-end">
                <div>
                    <h3 class="text-lg font-semibold text-green-500 mb-2">Photo de profil</h3>
                    @if ($candidat->photo)
                        <img src="{{ asset('storage/' . $candidat->photo) }}" alt="Photo candidat"
                            class="w-40 rounded-lg border-2 border-green-600 object-cover">
                    @else
                        <span class="text-gray-400">Aucune photo</span>
                    @endif
                </div>
                <div>
                    <h3 class="text-lg font-semibold text-green-500 mb-2">Affiche de campagne</h3>
                    @if ($candidat->affiche)
                        <img src="{{ asset('storage/' . $candidat->affiche) }}" alt="Affiche candidat"
                            class="w-40 rounded-lg border-2 border-green-600 object-cover">
                    @else
                        <span class="text-gray-400">Aucune affiche</span>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
