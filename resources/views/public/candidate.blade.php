@extends('partials.public.base', [
    'pageTitle' => 'Candidats',
    'pageName' => 'Liste des candidats',
])

@section('content')
    <section class="container mx-auto max-w-screen-xl p-6">
        <div class="w-full text-center flex flex-col items-center mb-8">
            <h2 class="mb-2 text-3xl lg:text-4xl font-extrabold tracking-tight leading-none text-white">
                Liste des candidats
            </h2>
            <p class="mb-3 font-normal text-gray-500 text-sm sm:px-16 lg:px-48">
                Découvrez les candidats pour chaque poste.
            </p>
            <div class="flex justify-center">
                <span class="w-32 h-1 bg-green-600 rounded-full"></span>
            </div>
        </div>

        <div class="container mx-auto">
            @forelse ($candidats as $poste => $liste)
                @php
                    $post = null;

                    switch ($poste) {
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

                <div class="md:grid grid-cols-4 gap-4 mb-8">
                    <div class="mb-4 md:mb-0">
                        <h2
                            class="text-xl font-bold text-white bg-gradient-to-r from-red-600 via-transparent to-red-600 py-2 rounded-lg text-center p-2">
                            Poste de {{ $post }}</h2>
                    </div>
                    <div class="col-span-3 grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($liste as $candidat)
                            @php
                                $level = null;
                                $filiere = null;

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
                                    case 'alumni':
                                        $level = 'Alumni';
                                        break;
                                    default:
                                        $level = $candidat->user->level;
                                }
                            @endphp
                            <div class="w-full max-w-sm bg-gray-800/20 border rounded-xl shadow-sm border-gray-800 p-4">
                                <div class="flex flex-col items-center pb-10">
                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg border border-2 border-green-700"
                                        src="{{ $candidat->photo ? Storage::url($candidat->photo) : asset('img/profil.jpg') }}"
                                        alt="image" />
                                    <h5 class="mb-1 text-xl font-bold text-white text-center">
                                        {{ $candidat->user->name }}</h5>
                                    <p class="text-gray-400 text-sm mt-2 line-clamp-3 font-semibold text-center">
                                        {{ $level }} - {{ $filiere }}
                                    </p>
                                    <ul class="flex space-x-4 mt-2">
                                        @if ($candidat->facebook)
                                            <li>
                                                <a href="{{ $candidat->facebook ?? 'https://facebook.com' }}"
                                                    target="_blank" class="text-blue-600 hover:text-blue-800">
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
                                                <a href="{{ $candidat->linkedin ?? 'https://linkedin.com' }}"
                                                    target="_blank" class="text-blue-700 hover:text-blue-900">
                                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                                        <path
                                                            d="M19 0h-14c-2.76 0-5 2.24-5 5v14c0 2.76 2.24 5 5 5h14c2.76 0 5-2.24 5-5v-14c0-2.76-2.24-5-5-5zm-11 19h-3v-10h3v10zm-1.5-11.25c-.97 0-1.75-.78-1.75-1.75s.78-1.75 1.75-1.75 1.75.78 1.75 1.75-.78 1.75-1.75 1.75zm13.5 11.25h-3v-5.5c0-1.1-.9-2-2-2s-2 .9-2 2v5.5h-3v-10h3v1.5c.41-.77 1.38-1.5 2.5-1.5 1.93 0 3.5 1.57 3.5 3.5v6.5z" />
                                                    </svg>
                                                </a>
                                            </li>
                                        @endif
                                    </ul>
                                    <div class="flex mt-4 md:mt-6">
                                        <a href="{{ route('candidate.detail', ['id' => $candidat->id]) }}"
                                            class="inline-flex items-center px-4 py-3 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                                            Découvrir
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @empty
                <div
                    class="text-center text-gray-500 p-6 border border-gray-800 bg-gray-800/20 rounded-xl shadow-xl italic font-semibold">
                    Aucun candidat disponible pour le moment
                </div>
            @endforelse
        </div>
    </section>
@endsection
