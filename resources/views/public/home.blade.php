@extends('partials.public.base', [
    'isHome' => true,
])

@section('content')
    <section class="bg-gray-800/20 container mx-auto max-w-screen-xl p-6 mb-16">
        <div class="grid md:grid-cols-2 gap-8 items-center md:px-16">
            <div>
                <div class="w-full flex flex-col mb-8">
                    <div class="flex gap-4">
                        <div class="flex justify-center">
                            <span class="w-1 h-10 bg-green-600 rounded-full"></span>
                        </div>
                        <h2 class="mb-2 text-3xl lg:text-4xl font-extrabold tracking-tight leading-none text-white">
                            A propos
                        </h2>
                    </div>
                </div>
                <p class="text-gray-300 mb-6 leading-relaxed">
                    L’<span class="font-bold text-red-700">AEMPO</span> est l’association représentative des étudiants
                    en médecine
                    de l’Université de Lomé. Elle œuvre pour la formation, la solidarité et l’épanouissement de la
                    communauté médicale étudiante,
                    à travers des projets scientifiques, sociaux et humanitaires.
                </p>
                <a href="{{ route('about') }}"
                    class="flex items-center px-6 py-3 text-sm font-semibold text-white bg-green-700 rounded-lg shadow-md hover:bg-green-800 transition">
                    En savoir plus
                    <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 5h12m0 0L9 1m4 4L9 9" />
                    </svg>
                </a>
            </div>

            <div class="relative">
                <img src="{{ asset('img/aempo.jpg') }}" alt="AEMPO" class="rounded-2xl shadow-lg w-full object-cover">
                <div class="absolute inset-0 bg-green-700/10 rounded-xl"></div>
            </div>
        </div>
    </section>

    <section class="container mx-auto max-w-screen-xl p-6 mb-16">

        <div class="w-full text-center flex flex-col items-center mb-8">
            <h2 class="mb-2 text-3xl lg:text-4xl font-extrabold tracking-tight leading-none text-white">
                Calendrier électoral
            </h2>
            <p class="mb-3 font-normal text-gray-500 text-sm sm:px-16 lg:px-48">
                Consultez les différentes phases du processus électoral.
            </p>
            <div class="flex justify-center">
                <span class="w-32 h-1 bg-green-600 rounded-full"></span>
            </div>
        </div>

        <div class="w-full flex justify-center">
            <ol class="relative border-s border-gray-700">

                {{-- PHASE 1 --}}
                <li class="mb-10 ms-4">
                    <div class="absolute w-3 h-3 bg-red-700 rounded-full mt-1.5 -start-1.5 border border-gray-900">
                    </div>
                    <time class="mb-1 text-sm font-normal text-gray-500 italic">
                        09 – 16 Octobre 2025
                    </time>
                    <h3 class="text-lg font-semibold text-white">
                        Dépôt des candidatures
                    </h3>
                    <p class="text-base font-normal text-gray-400">
                        Phase de dépôt et de validation des candidatures auprès de la Commission Électorale Indépendante.
                    </p>
                </li>

                {{-- PHASE 2 --}}
                <li class="mb-10 ms-4">
                    <div class="absolute w-3 h-3 bg-red-700 rounded-full mt-1.5 -start-1.5 border border-gray-900">
                    </div>
                    <time class="mb-1 text-sm font-normal text-gray-500 italic">
                        17 Octobre 2025
                    </time>
                    <h3 class="text-lg font-semibold text-white">
                        Étude et validation des dossiers
                    </h3>
                    <p class="text-base font-normal text-gray-400">
                        Analyse des candidatures et publication de la liste provisoire des candidats retenus.
                    </p>
                </li>

                {{-- PHASE 3 --}}
                <li class="mb-10 ms-4">
                    <div class="absolute w-3 h-3 bg-red-700 rounded-full mt-1.5 -start-1.5 border border-gray-900">
                    </div>
                    <time class="mb-1 text-sm font-normal text-gray-500 italic">
                        18 – 20 Octobre 2025
                    </time>
                    <h3 class="text-lg font-semibold text-white">
                        Contestations et publication définitive
                    </h3>
                    <p class="text-base font-normal text-gray-400">
                        Période de contestations et traitement des recours suivie de la publication de la liste définitive
                        des
                        candidats retenus.
                    </p>
                </li>

                {{-- PHASE 4 --}}
                <li class="mb-10 ms-4">
                    <div class="absolute w-3 h-3 bg-red-700 rounded-full mt-1.5 -start-1.5 border border-gray-900">
                    </div>
                    <time class="mb-1 text-sm font-normal text-gray-500 italic">
                        21 – 24 Octobre 2025
                    </time>
                    <h3 class="text-lg font-semibold text-white">
                        Campagne électorale
                    </h3>
                    <p class="text-base font-normal text-gray-400">
                        Période officielle de campagne : les candidats présentent leurs programmes et projets aux électeurs.
                    </p>
                </li>

                {{-- PHASE 5 --}}
                <li class="mb-10 ms-4">
                    <div class="absolute w-3 h-3 bg-red-700 rounded-full mt-1.5 -start-1.5 border border-gray-900">
                    </div>
                    <time class="mb-1 text-sm font-normal text-gray-500 italic">
                        25 Octobre 2025
                    </time>
                    <h3 class="text-lg font-semibold text-white">
                        Débat électoral
                    </h3>
                    <p class="text-base font-normal text-gray-400">
                        Débat public entre les différents candidats pour exposer leurs visions et priorités.
                    </p>
                </li>

                {{-- PHASE 6 --}}
                <li class="mb-10 ms-4">
                    <div class="absolute w-3 h-3 bg-red-700 rounded-full mt-1.5 -start-1.5 border border-gray-900">
                    </div>
                    <time class="mb-1 text-sm font-normal text-gray-500 italic">
                        27 Octobre 2025
                    </time>
                    <h3 class="text-lg font-semibold text-white">
                        Jour du scrutin
                    </h3>
                    <p class="text-base font-normal text-gray-400">
                        Déroulement du scrutin en ligne, dépouillement et proclamation des résultats provisoires.
                    </p>
                </li>

                {{-- PHASE 7 --}}
                <li class="ms-4">
                    <div class="absolute w-3 h-3 bg-red-700 rounded-full mt-1.5 -start-1.5 border border-gray-900">
                    </div>
                    <time class="mb-1 text-sm font-normal text-gray-500 italic">
                        28 – 29 Octobre 2025
                    </time>
                    <h3 class="text-lg font-semibold text-white">
                        Proclamation des résultats définitifs
                    </h3>
                    <p class="text-base font-normal text-gray-400">
                        Traitement des éventuels recours, puis proclamation officielle des résultats définitifs.
                    </p>
                </li>

            </ol>
        </div>
    </section>

    <section class="bg-gray-800/20 container mx-auto max-w-screen-xl p-6 mb-16">
        {{-- Titre principal --}}
        <div class="w-full text-center flex flex-col items-center mb-8">
            <h2 class="mb-2 text-3xl lg:text-4xl font-extrabold tracking-tight leading-none text-white">
                Communiqués
            </h2>
            <p class="mb-3 font-normal text-gray-500 text-sm sm:px-16 lg:px-48">
                Suivez les publications et annonces officielles de la CEI AEMPO-Lomé.
            </p>
            <div class="flex justify-center">
                <span class="w-32 h-1 bg-green-600 rounded-full"></span>
            </div>
        </div>

        {{-- Liste des communiqués --}}
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 md:px-16">
            @forelse ($communiques as $communique)
                <div
                    class="bg-gray-800/20 rounded-xl shadow-md border border-gray-800 overflow-hidden hover:shadow-xl transition-all duration-300">
                    <div class="p-6 flex flex-col justify-between h-full">
                        <div>
                            <h2 class="font-bold text-red-700 mb-2">
                                {{ $communique->title }}
                            </h2>
                            <div class="text-gray-400 text-sm mb-4">
                                {{ $communique->description }}
                            </div>
                        </div>
                        <div class="mt-auto">
                            <p class="text-sm text-gray-500 italic mb-3">
                                Publié le {{ $communique->published_at->format('d M Y') }}
                            </p>
                            <a href="{{ asset('communique/COMMUNIQUÉ 00' . {{ $communique->id }} . ' CEI-LOME AEMPO.pdf') }}" target="_blank"
                                class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-green-300 transition">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-3 h-3 mr-2"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                                    <path fill-rule="evenodd"
                                        d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                                </svg>
                                Télécharger le communiqué
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div
                    class="col-span-3 text-center text-gray-500 p-6 border border-gray-800 bg-gray-800/20 rounded-xl shadow-xl italic font-semibold">
                    Aucun communiqué disponible pour le moment
                </div>
            @endforelse

    </section>

    <section class="container mx-auto max-w-screen-xl p-6 mb-16">

        <div class="w-full text-center flex flex-col items-center mb-8">
            <h2 class="mb-2 text-3xl lg:text-4xl font-extrabold tracking-tight leading-none, text-white">
                FAQ - Questions fréquentes
            </h2>
            <p class="mb-3 font-normal text-gray-500 text-sm sm:px-16 lg:px-48">
                Trouvez rapidement les réponses aux questions les plus posées sur le processus électoral.
            </p>
            <div class="flex justify-center">
                <span class="w-32 h-1 bg-green-600 rounded-full"></span>
            </div>
        </div>
        <div id="accordion-collapse" data-accordion="collapse" class="md:px-16">
            <h2 id="accordion-collapse-heading-1">
                <button type="button"
                    class="flex items-center justify-between w-full p-5 font-medium border border-b-0 bg-gray-700/50 rounded-t-xl focus:ring-4 focus:ring-gray-800 border-gray-700 text-gray-400 hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-1" aria-expanded="true"
                    aria-controls="accordion-collapse-body-1">
                    <span class="text-red-700">Qui peut voter aux élections locales ?</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
                <div class="p-5 border border-b-0 border-gray-700 bg-gray-900">
                    <p class="mb-2 text-gray-400">
                        Sont électeurs seulement les membres actifs, honoraires, bienfaiteurs et les alumnis de
                        l’association à jour dans leur cotisation et ayant une carte de membre valide pour l'année en cours.
                    </p>
                </div>
            </div>

            <h2 id="accordion-collapse-heading-2">
                <button type="button"
                    class="bg-gray-700/50 flex items-center justify-between w-full p-5 font-medium border border-b-0 focus:ring-4 focus:ring-gray-800 border-gray-700 text-gray-400 hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-2" aria-expanded="false"
                    aria-controls="accordion-collapse-body-2">
                    <span class="text-red-700">Comment les candidats sont-ils sélectionnés ?</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                <div class="p-5 border border-b-0 border-gray-700 bg-gray-900">
                    <p class="mb-2 text-gray-400">
                        Les candidats sont recrutés par appel à candidature lancé par la commission électorale pour les
                        élections du
                        bureau local. Ils doivent remplir les critères d’éligibilité définis dans les statuts de
                        l’association.
                    </p>
                </div>
            </div>

            <h2 id="accordion-collapse-heading-3">
                <button type="button"
                    class="bg-gray-700/50 flex items-center justify-between w-full p-5 font-medium border focus:ring-4 focus:ring-gray-800 border-gray-700 text-gray-400 hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-3" aria-expanded="false"
                    aria-controls="accordion-collapse-body-3">
                    <span class="text-red-700">Comment se déroule le vote en ligne ?</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                <div class="p-5 border border-t-0 border-gray-700 bg-gray-900">
                    <p class="mb-2 text-gray-400">
                        Le vote se fait en ligne au scrutin secret nominal pluriel. Chaque électeur peut sélectionner un
                        seul candidat par poste. Après avoir sélectionné tous les candidats, l’électeur soumet ses votes via
                        le bouton de validation.
                    </p>
                    <p class="mb-2 text-gray-400">
                        Les responsables de la commission électorale supervisent et contrôlent l’intégrité du processus.
                    </p>
                </div>
            </div>

            <h2 id="accordion-collapse-heading-4">
                <button type="button"
                    class="bg-gray-700/50 flex items-center justify-between w-full p-5 font-medium border focus:ring-4 focus:ring-gray-800 border-gray-700 text-gray-400 hover:bg-gray-800 gap-3"
                    data-accordion-target="#accordion-collapse-body-4" aria-expanded="false"
                    aria-controls="accordion-collapse-body-4">
                    <span class="text-red-700">Que faire si je rencontre un problème technique ?</span>
                    <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5 5 1 1 5" />
                    </svg>
                </button>
            </h2>
            <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-4">
                <div class="p-5 border border-t-0 border-gray-700 bg-gray-900">
                    <p class="mb-2 text-gray-400">
                        Vous pouvez contacter la Commission Électorale à l'adresse suivante :
                        <a href="mailto:{{ config('mail.from.address') }}" class="font-semibold hover:underline">
                            {{ config('mail.from.address') }}
                        </a>
                    </p>
                    <p class="text-gray-400">
                        Assurez-vous d’indiquer votre problème en détail pour une assistance rapide.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-800/20 container mx-auto max-w-screen-xl p-6">

        <div class="w-full text-center flex flex-col items-center mb-8">
            <h2 class="mb-2 text-3xl lg:text-4xl font-extrabold tracking-tight leading-none text-white">
                Contact
            </h2>
            <div class="flex justify-center">
                <span class="w-32 h-1 bg-green-600 rounded-full"></span>
            </div>
        </div>
        <div class="md:px-16 text-center">
            <p class="text-gray-400">
                Pour toute question ou assistance concernant les élections, veuillez contacter la commission électorale à
                l'adresse email
                suivante :
            </p>
            <a href="mailto:{{ config('mail.from.address') }}" class="text-red-700 font-semibold hover:underline text-lg">
                {{ config('mail.from.address') }}
            </a>
        </div>
    </section>
@endsection
