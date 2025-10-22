<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.public._head')
</head>

<body class="bg-gray-900">

    <section class="container mx-auto max-w-3xl p-6 flex flex-col items-center justify-center text-center min-h-[70vh]">
        <h1 class="text-8xl font-extrabold text-red-600 mb-2">{{ $code }}</h1>

        <span class="w-24 h-1 bg-green-600 rounded-full mb-4"></span>

        <h2 class="text-2xl font-bold text-white mb-8">
            {{ $description }}
        </h2>

        <a href="{{ route('home') }}"
            class="inline-flex items-center px-5 py-3 bg-green-700 text-white rounded-lg hover:bg-green-800 transition font-semibold">
            Retour à l'accueil
        </a>
    </section>

    @include('partials.public._script')

</body>

</html>
