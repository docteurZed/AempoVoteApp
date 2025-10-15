@extends('partials.public.base', [
    'pageTitle' => 'Nom du candidat',
    'pageName' => 'Détails du candidat',
])

@section('content')
    <section class="container mx-auto max-w-5xl p-6 md:grid grid-cols-3 gap-8">
        {{-- En-tête du candidat --}}
        <div class="flex flex-col items-center text-center">
            <img class="w-36 h-36 rounded-full object-cover border-4 border-green-600 shadow-lg mb-4"
                src="{{ $candidat->photo ? asset('storage/' . $candidat->photo) : asset('img/profil.jpg') }}" alt="Candidat">

            <h1 class="text-2xl font-extrabold text-gray-900 dark:text-white mb-2">{{ $candidat->user->name }}</h1>
            @php
                $post = null;

                switch ($candidat->poste) {
                    case 'president':
                        $post = 'Président';
                        break;
                    case 'vpi':
                        $post = 'Vice-Président aux affaires internes';
                        break;
                    case 'vpe':
                        $post = 'Vice-Président aux affaires externes';
                        break;
                    case 'secretaire':
                        $post = 'Secrétaire';
                        break;
                    case 'tresorier':
                        $post = 'Trésorier';
                        break;
                    case 'scome':
                        $post = 'Responsable SCOME';
                        break;
                    case 'score':
                        $post = 'Responsable SCORE';
                        break;
                    case 'scope':
                        $post = 'Responsable SCOPE';
                        break;
                    case 'scora':
                        $post = 'Responsable SCORA';
                        break;
                    case 'scoph':
                        $post = 'Responsable SCOPH';
                        break;
                    case 'scohe':
                        $post = 'Responsable SCOHE';
                        break;
                    case 'communication':
                        $post = 'Chargé de Communication';
                        break;
                    case 'sport':
                        $post = 'Chargé des activités culturelles et sportives';
                        break;
                    default:
                        $post = ucfirst(str_replace('_', ' ', $poste));
                        break;
                }
            @endphp

            <p class="text-green-700 text-sm font-semibold">Poste de {{ $post }}</p>

            @if ($candidat->slogan)
                <p class="mt-3 text-gray-500 italic">« {{ $candidat->slogan }} »</p>
            @endif

            <ul class="flex space-x-4 mt-2">
                @if ($candidat->facebook)
                    <li>
                        <a href="{{ $candidat->facebook ?? 'https://facebook.com' }}" target="_blank"
                            class="text-blue-600 hover:text-blue-800">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22 12c0-5.522-4.478-10-10-10S2 6.478 2 12c0 5.019 3.676 9.163 8.438 9.877v-6.987h-2.54v-2.89h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562v1.875h2.773l-.443 2.89h-2.33v6.987C18.324 21.163 22 17.019 22 12z" />
                            </svg>
                        </a>
                    </li>
                @endif
                @if ($candidat->twitter)
                    <li>
                        <a href="{{ $candidat->twitter ?? 'https://twitter.com' }}" target="_blank"
                            class="text-blue-400 hover:text-blue-600">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M22.46 6c-.77.35-1.6.59-2.47.7a4.3 4.3 0 0 0 1.88-2.37 8.59 8.59 0 0 1-2.72 1.04 4.28 4.28 0 0 0-7.29 3.9A12.13 12.13 0 0 1 3.15 4.6a4.28 4.28 0 0 0 1.32 5.71c-.7-.02-1.36-.21-1.94-.53v.05a4.28 4.28 0 0 0 3.43 4.19c-.33.09-.68.14-1.04.14-.25 0-.5-.02-.74-.07a4.29 4.29 0 0 0 4 2.97A8.6 8.6 0 0 1 2 19.54a12.13 12.13 0 0 0 6.56 1.92c7.88 0 12.2-6.53 12.2-12.2 0-.19-.01-.37-.02-.56A8.72 8.72 0 0 0 24 4.59a8.48 8.48 0 0 1-2.54.7z" />
                            </svg>
                        </a>
                    </li>
                @endif
                @if ($candidat->linkedin)
                    <li>
                        <a href="{{ $candidat->linkedin ?? 'https://linkedin.com' }}" target="_blank"
                            class="text-blue-700 hover:text-blue-900">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M19 0h-14c-2.76 0-5 2.24-5 5v14c0 2.76 2.24 5 5 5h14c2.76 0 5-2.24 5-5v-14c0-2.76-2.24-5-5-5zm-11 19h-3v-10h3v10zm-1.5-11.25c-.97 0-1.75-.78-1.75-1.75s.78-1.75 1.75-1.75 1.75.78 1.75 1.75-.78 1.75-1.75 1.75zm13.5 11.25h-3v-5.5c0-1.1-.9-2-2-2s-2 .9-2 2v5.5h-3v-10h3v1.5c.41-.77 1.38-1.5 2.5-1.5 1.93 0 3.5 1.57 3.5 3.5v6.5z" />
                            </svg>
                        </a>
                    </li>
                @endif
            </ul>

            @if ($candidat->affiche)
                <div class="rounded-2xl shadow-md p-4 mt-8">
                    <img src="{{ asset('storage/' . $candidat->affiche) }}" alt="Affiche de campagne"
                        class="rounded-xl shadow">
                </div>
            @endif

            @if ($candidat->video)
                <div class="mt-8">
                    <div class="aspect-w-16 aspect-h-9 rounded-xl overflow-hidden shadow-lg">
                        <iframe src="{{ $candidat->video }}" class="w-full h-full" frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
            @endif
        </div>

        {{-- Contenu principal --}}
        <div class="col-span-2 mt-8 md:mt-0 mx-4 md:mx-0">
            {{-- Colonne principale --}}
            <div class="space-y-6">
                <div class="bg-white dark:bg-gray-900 mt-4 md:mt-8">
                    <div class="mb-4">
                        <div class="border-l pl-3 border-red-700">
                            <h2 class="text-lg font-bold text-red-700 tracking-wide">Informations</h2>
                        </div>
                    </div>
                    <div class="pl-8">
                        <ul class="text-gray-800 dark:text-gray-100 space-y-2 list-disc">
                            @php
                                $filiere = '';
                                $level = '';

                                switch ($candidat->user->filiere) {
                                    case 'medecine':
                                        $filiere = 'Médecine';
                                        break;
                                    case 'pharmacie':
                                        $filiere = 'Pharmacie';
                                        break;
                                    case 'odonto':
                                        $filiere = 'Odonto-Stomatologie';
                                        break;
                                    default:
                                        $filiere = $candidat->user->filiere;
                                }

                                switch ($candidat->user->level) {
                                    case 'l1':
                                        $level = 'Première année';
                                        break;
                                    case 'l2':
                                        $level = 'Deuxième année';
                                        break;
                                    case 'l3':
                                        $level = 'Troisième année';
                                        break;
                                    case 'm1':
                                        $level = 'Quatrième année';
                                        break;
                                    case 'm2':
                                        $level = 'Cinquième année';
                                        break;
                                    case 'd1':
                                        $level = 'Sixième année';
                                        break;
                                    case 'd2':
                                        $level = 'Interne';
                                        break;
                                    case 'd3':
                                        $level = 'Année de thèse';
                                        break;
                                    default:
                                        $level = $candidat->user->level;
                                }
                            @endphp

                            <li>Filière : {{ $filiere }}</li>
                            <li>Niveau : {{ $level }}</li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="mb-4">
                        <div class="border-l pl-3 border-red-700">
                            <h2 class="text-lg font-bold text-red-700 tracking-wide">Biographie</h2>
                        </div>
                    </div>
                    <div class="pl-8">
                        <div class="text-gray-800 dark:text-gray-100 leading-relaxed">
                            {{ $candidat->bio }}
                        </div>
                    </div>
                </div>

                <div>
                    <div class="mb-4">
                        <div class="border-l pl-3 border-red-700">
                            <h2 class="text-lg font-bold text-red-700 tracking-wide">Programme</h2>
                        </div>
                    </div>
                    <div class="pl-8">
                        <div class="text-gray-800 dark:text-gray-100 leading-relaxed">
                            {{ $candidat->programme }}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
