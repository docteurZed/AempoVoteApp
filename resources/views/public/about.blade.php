@extends('partials.public.base', [
    'pageTitle' => 'Candidats',
    'pageName' => 'Liste des candidats',
])

@section('content')
    <section class="container mx-auto max-w-screen-xl p-6">
        {{-- Titre principal --}}
        <div class="w-full text-center flex flex-col items-center mb-8">
            <h2 class="mb-2 text-3xl lg:text-4xl font-extrabold tracking-tight leading-none text-gray-900 dark:text-white">
                A propos
            </h2>
            <div class="flex justify-center">
                <span class="w-32 h-1 bg-green-600 rounded-full"></span>
            </div>
        </div>

        <div class="md:px-16">
            <p class="text-gray-600 dark:text-gray-300 mb-8">
                L’<span class="font-semibold text-red-700">Association des Étudiants en Médecine de l’Université de Lomé
                    (AEMPO)</span>
                est une organisation académique et humanitaire qui œuvre pour le développement scientifique, social et
                culturel des futurs médecins.
                Elle s’engage à former une génération de professionnels de santé responsables, solidaires et ouverts sur le
                monde.
            </p>

            {{-- Bloc sur le bureau local --}}
            <div class="bg-gray-100 dark:bg-gray-800/20 rounded-xl shadow-md p-6 mb-8">
                <div class="flex gap-4 mb-4">
                    <div class="flex justify-center">
                        <span class="w-1 h-6 bg-green-600 rounded-full"></span>
                    </div>
                    <h3 class="mb-2 text-2xl font-bold tracking-tight leading-none text-red-700">
                        Le bureau local
                    </h3>
                </div>
                <p class="text-gray-600 dark:text-gray-300">
                    Le bureau local de l’AEMPO assure la gestion quotidienne des activités, la représentation des étudiants,
                    ainsi que la mise en œuvre des projets et campagnes. Il est composé d’un comité exécutif et de plusieurs
                    officiers permanents, chacun chargé d’un domaine spécifique de l’organisation.
                </p>
            </div>

            {{-- Rôles des principaux postes --}}
            <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3 mb-8">
                <div class="bg-gray-100 dark:bg-gray-800/20 rounded-xl p-6 shadow-sm hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-red-700">Président</h3>
                    <div class="flex mb-2">
                        <span class="w-8 h-1 bg-green-600 rounded-full"></span>
                    </div>
                    <p class="text-gray-500 text-sm">
                        Coordonne l’ensemble des activités, représente l’association et veille à la bonne exécution des
                        décisions.
                    </p>
                </div>

                <div class="bg-gray-100 dark:bg-gray-800/20 rounded-xl p-6 shadow-sm hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-red-700">Vice Président</h3>
                    <div class="flex mb-2">
                        <span class="w-8 h-1 bg-green-600 rounded-full"></span>
                    </div>
                    <p class="text-gray-500 text-sm">
                        Le VPI soutient la présidence dans les affaires internes, tandis que le VPE gère les relations
                        extérieures et les partenariats.
                    </p>
                </div>

                <div class="bg-gray-100 dark:bg-gray-800/20 rounded-xl p-6 shadow-sm hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-red-700">Secrétariat général</h3>
                    <div class="flex mb-2">
                        <span class="w-8 h-1 bg-green-600 rounded-full"></span>
                    </div>
                    <p class="text-gray-500 text-sm">
                        Assure la coordination administrative, la rédaction des comptes rendus et le suivi des décisions.
                    </p>
                </div>

                <div class="bg-gray-100 dark:bg-gray-800/20 rounded-xl p-6 shadow-sm hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-red-700">Tésorerie</h3>
                    <div class="flex mb-2">
                        <span class="w-8 h-1 bg-green-600 rounded-full"></span>
                    </div>
                    <p class="text-gray-500 text-sm">
                        Gère les finances, élabore le budget et garantit la transparence dans la gestion des ressources.
                    </p>
                </div>

                <div class="bg-gray-100 dark:bg-gray-800/20 rounded-xl p-6 shadow-sm hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-red-700">Communication & Sport</h3>
                    <div class="flex mb-2">
                        <span class="w-8 h-1 bg-green-600 rounded-full"></span>
                    </div>
                    <p class="text-gray-500 text-sm">
                        Ces postes dynamisent la vie associative à travers la visibilité, la cohésion et les activités
                        récréatives.
                    </p>
                </div>

                <div class="bg-gray-100 dark:bg-gray-800/20 rounded-xl p-6 shadow-sm hover:shadow-lg transition">
                    <h3 class="text-lg font-semibold text-red-700">Officiers permanents</h3>
                    <div class="flex mb-2">
                        <span class="w-8 h-1 bg-green-600 rounded-full"></span>
                    </div>
                    <p class="text-gray-500 text-sm">
                        Les responsables des comités permanents (SCOME, SCOPH, SCORE, SCORA, SCOPE, etc.) coordonnent les
                        activités de santé publique, d’échanges, de formation et d’éducation médicale.
                    </p>
                </div>
            </div>

            <div>
                <a href="{{ asset('img/sco.jpg') }}" target="_blank"
                    class="inline-flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-green-300 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="w-3 h-3 mr-2" viewBox="0 0 16 16">
                        <path
                            d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                        <path fill-rule="evenodd"
                            d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                    </svg>
                    Détails sur les comités permanents
                </a>
            </div>
        </div>
    </section>
@endsection
