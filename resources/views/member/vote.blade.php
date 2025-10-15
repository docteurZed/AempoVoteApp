@extends('partials.member.base')

@section('content')
    <section class="container mx-auto max-w-screen-xl px-6 py-12">

        @if (Session::has('success'))
            <div id="alert-sucess"
                class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                role="alert">
                <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ Session::get('success') }}
                </div>
                <button type="button"
                    class="ms-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                    data-dismiss-target="#alert-sucess" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @elseif($errors->any())
            @foreach ($errors->all() as $error)
                <div id="alert-error-{{ $loop->index }}"
                    class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg class="shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium">
                        {{ $error }}
                    </div>
                    <button type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-error-{{ $loop->index }}" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endforeach
        @endif

        <div class="w-full text-center flex flex-col items-center mb-8 md:mb-16">
            <h2 class="mb-2 text-3xl lg:text-4xl font-extrabold tracking-tight leading-none text-gray-900 dark:text-white">
                Votez pour vos candidats favoris
            </h2>
            <p class="mb-3 font-normal text-gray-500 text-sm sm:px-16 lg:px-48">
                Choisissez le candidat de votre choix pour chaque poste.
                Prenez le temps de consulter leurs profils avant de valider vos votes.
            </p>
            <div class="flex justify-center">
                <span class="w-32 h-1 bg-green-600 rounded-full"></span>
            </div>
        </div>

        <form action="{{ route('member.vote.store') }}" method="POST" class="space-y-12">
            @csrf

            <input type="hidden" name="election_id" value="{{ $election->id }}">
            <div class="container mx-auto">
                @foreach ($candidats as $poste => $liste)
                    <div class="md:grid grid-cols-4 gap-4 mb-8">
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

                        <div class="mb-8 md:mb-0">
                            <div class="border-l pl-3 border-red-700">
                                <h2 class="text-2xl font-extrabold text-red-700 tracking-wide">
                                    Poste de {{ ucfirst($post) }}
                                </h2>
                            </div>
                        </div>

                        <div class="col-span-3 grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach ($liste as $candidat)
                                @php
                                    $isChecked = $votes->has($poste) && $votes[$poste]->candidat_id == $candidat->id;
                                @endphp

                                <label
                                    class="group relative cursor-pointer block bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all">
                                    <input type="radio" name="vote[{{ $poste }}]" value="{{ $candidat->id }}"
                                        class="peer hidden" @checked($isChecked) @disabled($hasVoted)>

                                    <div class="p-6 flex flex-col items-center text-center">
                                        <img src="{{ $candidat->photo ? asset('storage/' . $candidat->photo) : asset('img/profil.jpg') }}"
                                            class="w-28 h-28 rounded-full mb-4 border-4 border-gray-200 group-hover:border-green-600 peer-checked:border-green-600 transition">
                                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                            {{ $candidat->user->name }}
                                        </h3>
                                        <p class="text-gray-600 text-sm mt-2 font-semibold">

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
                                                    default:
                                                        $level = $candidat->user->level;
                                                }
                                            @endphp

                                            {{ strtoupper($level) }} - {{ ucfirst($filiere) }}
                                        </p>
                                    </div>

                                    <div
                                        class="absolute inset-0 border-2 border-transparent peer-checked:border-green-600 rounded-xl transition-all duration-200">
                                    </div>
                                    <div
                                        class="absolute top-2 right-2 hidden peer-checked:flex items-center justify-center w-6 h-6 bg-green-600 text-white text-xs font-bold rounded-full shadow">
                                        ✓
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            @unless ($hasVoted)
                <div class="text-center mt-12">
                    <button type="submit"
                        class="inline-flex items-center justify-center px-8 py-3 bg-green-700 text-white font-semibold text-lg rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 transition cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 16 16"
                            stroke="currentColor">
                            <path
                                d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
                            <path
                                d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z" />
                        </svg>
                        Soumettre mes votes
                    </button>
                </div>
            @endunless
        </form>
    </section>
@endsection
