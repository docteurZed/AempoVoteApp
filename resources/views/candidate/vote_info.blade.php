@extends('partials.candidate.base')

@section('content')
    <section class="max-w-3xl mx-auto mt-16 p-8 border border-gray-700 bg-gray-800/40 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-red-600 mb-8">Profil du candidat</h2>

        @if (session('success'))
            <div class="mb-6 p-4 text-green-600 rounded-lg bg-gray-700">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('candidat.vote.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- INFORMATIONS PRINCIPALES --}}
            <div class="space-y-6">
                <div>
                    <label for="slogan" class="block mb-2 font-semibold text-green-600">Slogan</label>
                    <input type="text" name="slogan" id="slogan" value="{{ old('slogan', $candidat->slogan) }}"
                        placeholder="Ex : Ensemble pour une AEMPO plus forte"
                        class="bg-gray-700/50 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                </div>

                <div>
                    <label for="bio" class="block mb-2 font-semibold text-green-600">Biographie</label>
                    <textarea name="bio" id="bio"
                        placeholder="Parlez brièvement de votre parcours et vos motivations"
                        class="bg-gray-700/50 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">{{ old('bio', $candidat->bio) }}</textarea>
                </div>

                <div>
                    <label for="programme" class="block mb-2 font-semibold text-green-600">Programme</label>
                    <textarea name="programme" id="programme"
                        placeholder="Décrivez brièvement votre programme ou vos axes prioritaires"
                        class="bg-gray-700/50 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">{{ old('programme', $candidat->programme) }}</textarea>
                </div>
            </div>

            {{-- UPLOADS --}}
            <div class="space-y-8">
                {{-- PHOTO --}}
                <div>
                    <label for="photo" class="block mb-3 text-green-600 font-semibold">Photo de profil</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="photo"
                            class="flex flex-col items-center justify-center w-full h-24 border-2 border-dashed border-gray-600 rounded-lg cursor-pointer bg-gray-700/40 hover:bg-gray-700 transition-all">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5A5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-1 text-sm text-gray-400"><span class="font-semibold text-red-500">Cliquez
                                        pour
                                        téléverser</span> ou glissez-déposez</p>
                                <p class="text-xs text-gray-500">PNG, JPG</p>
                            </div>
                            <input id="photo" name="photo" type="file" class="hidden"  accept=".png,.jpg,.jpeg"/>
                        </label>
                    </div>
                    @if ($candidat->photo)
                        <img src="{{ asset('storage/' . $candidat->photo) }}" alt="Photo actuelle"
                            class="mt-3 w-40 rounded-lg border-2 border-green-600 object-cover mx-auto">
                    @endif
                </div>

                {{-- AFFICHE --}}
                <div>
                    <label for="affiche" class="block mb-3 text-green-600 font-semibold">Affiche de campagne</label>
                    <div class="flex items-center justify-center w-full">
                        <label for="affiche"
                            class="flex flex-col items-center justify-center w-full h-24 border-2 border-dashed border-gray-600 rounded-lg cursor-pointer bg-gray-700/40 hover:bg-gray-700 transition-all">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg class="w-8 h-8 mb-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 20 16">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5A5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                                </svg>
                                <p class="mb-1 text-sm text-gray-400"><span class="font-semibold text-red-500">Cliquez
                                        pour
                                        téléverser</span> ou glissez-déposez</p>
                                <p class="text-xs text-gray-500">Affiche PNG ou JPG</p>
                            </div>
                            <input id="affiche" name="affiche" type="file" class="hidden" accept=".png,.jpg,.jpeg" />
                        </label>
                    </div>
                    @if ($candidat->affiche)
                        <img src="{{ asset('storage/' . $candidat->affiche) }}" alt="Affiche actuelle"
                            class="mt-3 w-40 rounded-lg border-2 border-green-600 object-cover mx-auto">
                    @endif
                </div>
            </div>

            {{-- VIDÉO --}}
            <div>
                <label for="video" class="block mb-2 font-semibold text-green-600">Vidéo de campagne (URL)</label>
                <input type="url" name="video" id="video" value="{{ old('video', $candidat->video) }}"
                    placeholder="https://youtube.com/..."
                    class="bg-gray-700/50 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
            </div>

            {{-- BOUTON --}}
            <div class="text-center pt-6">
                <button type="submit"
                    class="px-8 py-2.5 rounded-lg text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-600 font-semibold transition-all duration-300 cursor-pointer">
                    Mettre à jour mes informations
                </button>
            </div>
        </form>
    </section>
@endsection
