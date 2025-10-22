@extends('partials.candidate.base')

@section('content')
    <section class="max-w-3xl mx-auto mt-16 p-8 border border-gray-700 bg-gray-800/40 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-red-600 mb-8">Informations personnelles</h2>

        @if (session('success'))
            <div class="mb-6 p-4 text-green-600 rounded-lg bg-gray-700">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('candidat.infos.update') }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid gap-6 md:grid-cols-2">
                <div>
                    <label for="name" class="block mb-2 font-semibold text-green-600">Nom complet</label>
                    <input type="text" name="name" id="name" value="{{ old('name', auth()->user()->name) }}"
                        class="bg-gray-700/50 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                        required>
                </div>

                <div>
                    <label for="email" class="block mb-2 font-semibold text-green-600">Adresse email</label>
                    <input type="email" name="email" id="email" value="{{ old('email', auth()->user()->email) }}"
                        class="bg-gray-700/50 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 cursor-not-allowed"
                        readonly>
                </div>

                <div>
                    <label for="phone" class="block mb-2 font-semibold text-green-600">Numéro de téléphone</label>
                    <input type="tel" name="phone" id="phone" value="{{ old('phone', auth()->user()->phone) }}"
                        class="bg-gray-700/50 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5"
                        placeholder="+228 00 00 00 00">
                </div>

                <div>
                    <label for="filiere" class="block mb-2 font-semibold text-green-600">Filière</label>
                    <select name="filiere" id="filiere"
                        class="bg-gray-700/50 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                        <option value="">-- Sélectionner --</option>
                        <option value="medecine" @selected(auth()->user()->filiere === 'medecine')>Médecine</option>
                        <option value="pharmacie" @selected(auth()->user()->filiere === 'pharmacie')>Pharmacie</option>
                        <option value="odonto" @selected(auth()->user()->filiere === 'odonto')>Odontostomatologie</option>
                    </select>
                </div>

                <div>
                    <label for="level" class="block mb-2 font-semibold text-green-600">Niveau</label>
                    <select name="level" id="level"
                        class="bg-gray-700/50 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                        <option value="">-- Sélectionner --</option>
                        <option value="l1" @selected(auth()->user()->level === 'l1')>Première année</option>
                        <option value="l2" @selected(auth()->user()->level === 'l2')>Deuxième année</option>
                        <option value="l3" @selected(auth()->user()->level === 'l3')>Troisième année</option>
                        <option value="m1" @selected(auth()->user()->level === 'm1')>Quatrième année</option>
                        <option value="m2" @selected(auth()->user()->level === 'm2')>Cinquième année</option>
                        <option value="d1" @selected(auth()->user()->level === 'd1')>Sixième année</option>
                        <option value="d2" @selected(auth()->user()->level === 'd2')>Interne</option>
                        <option value="d3" @selected(auth()->user()->level === 'd3')>Année de thèse</option>
                        <option value="alumni" @selected(auth()->user()->level === 'alumni')Alumni</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-2 font-semibold text-green-600">Rôle</label>
                    <input type="text" value="{{ ucfirst(auth()->user()->role) }}"
                        class="bg-gray-700/50 border border-gray-600 text-gray-400 text-sm rounded-lg block w-full p-2.5 cursor-not-allowed"
                        readonly>
                </div>
            </div>

            <div class="text-center pt-6">
                <button type="submit"
                    class="px-8 py-2.5 rounded-lg text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-600 font-semibold transition-all duration-300 cursor-pointer">
                    Mettre à jour mes informations
                </button>
            </div>
        </form>
    </section>
@endsection
