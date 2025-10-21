@extends('partials.candidate.base')

@section('content')
    <section class="max-w-3xl mx-auto mt-16 p-8 border border-gray-700 bg-gray-800/40 rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-center text-red-600 mb-8">Profil du candidat</h2>

        @if (session('success'))
            <div class="mb-6 p-4 text-green-600 rounded-lg bg-gray-700">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('candidat.media.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid md:grid-cols-2 gap-6">
                <div>
                    <label for="facebook" class="block mb-2 text-sm font-medium text-green-600">Facebook</label>
                    <input type="url" name="facebook" id="facebook" value="{{ old('facebook', $candidat->facebook) }}"
                        placeholder="https://facebook.com/votre-profil"
                        class="bg-gray-700/50 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                </div>

                <div>
                    <label for="twitter" class="block mb-2 text-sm font-medium text-green-600">Twitter / X</label>
                    <input type="url" name="twitter" id="twitter" value="{{ old('twitter', $candidat->twitter) }}"
                        placeholder="https://twitter.com/votre-profil"
                        class="bg-gray-700/50 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                </div>

                <div>
                    <label for="linkedin" class="block mb-2 text-sm font-medium text-green-600">LinkedIn</label>
                    <input type="url" name="linkedin" id="linkedin" value="{{ old('linkedin', $candidat->linkedin) }}"
                        placeholder="https://linkedin.com/in/votre-profil"
                        class="bg-gray-700/50 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
                </div>

                <div>
                    <label for="instagram" class="block mb-2 text-sm font-medium text-green-600">Instagram</label>
                    <input type="url" name="instagram" id="instagram"
                        value="{{ old('instagram', $candidat->instagram) }}"
                        placeholder="https://instagram.com/votre-profil"
                        class="bg-gray-700/50 border border-gray-600 text-white text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5">
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
