@extends('partials.member.base')

@section('content')
    <section class="container mx-auto max-w-screen-xl px-6 py-12">
        @if (Session::has('success'))
            <div class="flex items-center p-4 mb-4 rounded-lg bg-gray-800/40 text-green-600"
                role="alert">
                <svg class="shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z" />
                </svg>
                <div class="ms-3 text-sm font-medium">{{ Session::get('success') }}</div>
            </div>
        @elseif($errors->any())
            @foreach ($errors->all() as $error)
                <div class="flex items-center p-4 mb-4 rounded-lg bg-red-50 bg-gray-800/40 text-red-600"
                    role="alert">
                    <svg class="shrink-0 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Z" />
                    </svg>
                    <div class="ms-3 text-sm font-medium">{{ $error }}</div>
                </div>
            @endforeach
        @endif

        @if ($hasVoted)
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-white">
                    Merci d'avoir voté !
                </h2>
                <div class="mt-3">
                    <span class="w-32 h-1 bg-green-600 rounded-full inline-block"></span>
                </div>
            </div>
        @else
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-white">
                    Votez pour vos candidats favoris
                </h2>
                <div class="mt-3">
                    <span class="w-32 h-1 bg-green-600 rounded-full inline-block"></span>
                </div>
            </div>
        @endif

        @if (!$hasVoted)
            <div class="bg-gray-800/50 border border-gray-700 rounded-lg p-4 mb-8 text-center">
                <h3 class="text-2xl font-bold text-green-500 mb-2">🗳️ Instruction</h3>
                <p class="text-gray-300 text-sm leading-relaxed">
                    Pour chaque <span class="font-semibold text-white">poste</span>, sélectionnez un candidat.
                    Si vous ne voulez soutenir aucun candidat pour un poste, laissez-le vide : cela sera considéré comme une
                    <span class="font-semibold text-yellow-400">abstention</span>. <br>
                    Une fois terminé, cliquez sur <span class="font-semibold text-green-600">“Soumettre mes votes”</span>.
                    <br>
                    Après soumission, <span class="text-red-600">aucune modification ne sera possible</span>.
                </p>
            </div>
        @endif

        <form action="{{ route('member.vote.store') }}" method="POST" class="space-y-10">
            @csrf
            <input type="hidden" name="election_id" value="{{ $election->id }}">

            @foreach ($candidats as $poste => $liste)
                @php
                    $nomsPostes = [
                        'president' => 'Président',
                        'vpi' => 'Vice-Président aux affaires internes',
                        'vpe' => 'Vice-Président aux affaires externes',
                        'secretaire' => 'Secrétaire',
                        'tresorier' => 'Trésorier',
                        'scome' => 'Responsable SCOME',
                        'score' => 'Responsable SCORE',
                        'scope' => 'Responsable SCOPE',
                        'scora' => 'Responsable SCORA',
                        'scoph' => 'Responsable SCOPH',
                        'scohe' => 'Responsable SCOHE',
                        'communication' => 'Chargé de Communication',
                        'sport' => 'Chargé des activités culturelles et sportives',
                    ];
                    $labelPoste = $nomsPostes[$poste] ?? ucfirst(str_replace('_', ' ', $poste));
                @endphp

                <div class="rounded-2xl p-6 shadow-md bg-gray-900/60 backdrop-blur-md">
                    <div class="mb-6 text-center">
                        <h3
                            class="text-2xl font-bold text-white bg-gradient-to-r from-red-600 via-transparent to-red-600 py-2 rounded-lg">
                            Poste de {{ $labelPoste }}
                        </h3>
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($liste as $candidat)
                            @php
                                $isChecked = $votes->has($poste) && $votes[$poste]->candidat_id == $candidat->id;
                            @endphp

                            {{-- Carte candidat (info à gauche, photo à droite) --}}
                            <label
                                class="candidate-card relative flex flex-col flex-row items-center gap-4 p-4 rounded-xl bg-gray-800 border border-gray-700 shadow-sm hover:shadow-lg transition-transform duration-200"
                                data-poste="{{ $poste }}" data-candidat-id="{{ $candidat->id }}">
                                <input type="radio" name="vote[{{ $poste }}]" value="{{ $candidat->id }}"
                                    class="hidden candidate-input" @checked($isChecked)
                                    @disabled($hasVoted)>

                                {{-- Infos (gauche) --}}
                                <div class="flex-1 text-left">
                                    <h4 class="text-lg font-bold text-white">
                                        {{ $candidat->user->name }}
                                    </h4>
                                    <p class="text-gray-300 text-sm mt-1 font-semibold">
                                        {{ $candidat->user->level ? strtoupper($candidat->user->level) : '' }}
                                        @if ($candidat->user->filiere)
                                            - {{ ucfirst($candidat->user->filiere) }}
                                        @endif
                                    </p>
                                    @if ($candidat->slogan)
                                        <p class="text-gray-500 text-sm mt-2 line-clamp-2">
                                            {{ Str::limit($candidat->slogan, 90) }}
                                        </p>
                                    @endif
                                </div>

                                {{-- Photo (droite) --}}
                                <div class="relative w-28 h-28 flex-shrink-0">
                                    <img src="{{ $candidat->photo ? asset('storage/' . $candidat->photo) : asset('img/profil.jpg') }}"
                                        alt="Photo de {{ $candidat->user->name }}"
                                        class="w-full h-full object-cover rounded-lg border-2 border-transparent peer-checked:border-green-600 transition-all">

                                    {{-- Indicateur circulaire (top-right) --}}
                                    <div
                                        class="select-indicator absolute -top-2 -right-2 w-7 h-7 rounded-full flex items-center justify-center text-white text-xs font-bold border-2 border-gray-300 transition-all">
                                        <!-- le contenu (✓) sera affiché via JS/CSS quand sélectionné -->
                                    </div>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endforeach

            {{-- Bouton de soumission --}}
            @unless ($hasVoted)
                <div class="text-center mt-6">
                    <button type="submit"
                        class="px-8 py-3 bg-green-700 text-white font-semibold text-lg rounded-lg hover:bg-green-800 focus:ring-4 focus:ring-green-300 transition">
                        Soumettre mes votes
                    </button>
                </div>
            @endunless
        </form>
    </section>

    <script>
        (function() {
            // initialisation : gérer états visuels selon radios déjà cochés au chargement
            document.querySelectorAll('.candidate-card').forEach(card => {
                const input = card.querySelector('.candidate-input');
                const indicator = card.querySelector('.select-indicator');

                // applique l'état visuel initial
                updateCardVisual(card, input, indicator);
            });

            // clique sur la carte -> toggle sélection (déselection possible)
            document.querySelectorAll('.candidate-card').forEach(card => {
                card.addEventListener('click', function(e) {
                    // ignore si clique sur un élément interactif (ex: lien)
                    if (e.target.closest('a')) return;

                    const input = this.querySelector('.candidate-input');
                    if (!input || input.disabled) return;

                    e.preventDefault(); // bloquer comportement natif de label

                    const groupName = input.name; // ex: vote[president]

                    if (input.checked) {
                        // déjà sélectionné => désélectionner
                        input.checked = false;
                        // mettre à jour visuels
                        updateGroupVisuals(groupName);
                    } else {
                        // sélectionner cette option et désélectionner les autres du groupe
                        document.querySelectorAll(`input[name="${groupName}"]`).forEach(r => r.checked =
                            false);
                        input.checked = true;
                        updateGroupVisuals(groupName);
                    }

                    // déclencher un event change (utile si tu écoutes côté JS)
                    input.dispatchEvent(new Event('change', {
                        bubbles: true
                    }));
                });
            });

            // met à jour visuel d'un groupe (tous les labels partagent le même name)
            function updateGroupVisuals(groupName) {
                document.querySelectorAll(`input[name="${groupName}"]`).forEach(r => {
                    const card = r.closest('.candidate-card');
                    const indicator = card.querySelector('.select-indicator');
                    updateCardVisual(card, r, indicator);
                });
            }

            // applique classes visuelles sur une carte en fonction de l'état checked
            function updateCardVisual(card, input, indicator) {
                if (!card || !input) return;
                if (input.checked) {
                    card.classList.add('ring-2', 'ring-green-600', 'shadow-lg');
                    // indicator style (vert + tick)
                    indicator.classList.add('bg-green-600', 'border-green-600');
                    indicator.textContent = '✓';
                    indicator.style.color = '#fff';
                } else {
                    card.classList.remove('ring-2', 'ring-green-600', 'shadow-lg');
                    indicator.classList.remove('bg-green-600', 'border-green-600');
                    indicator.textContent = '';
                }
            }

            // si tu veux : rendre clique sur l'input natif aussi fonctionnel (au cas où)
            document.querySelectorAll('.candidate-input').forEach(input => {
                input.addEventListener('change', function() {
                    const groupName = this.name;
                    updateGroupVisuals(groupName);
                });
            });
        })();
    </script>

@endsection
