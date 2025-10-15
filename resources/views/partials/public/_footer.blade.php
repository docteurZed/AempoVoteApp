<footer class="border-t border-gray-500">
    <div class="w-full p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="{{ route('home') }}" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('img/logo.png') }}" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-bold whitespace-nowrap text-red-700">{{ config('app.name') }}</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="{{ route('home') }}" class="hover:underline me-4 md:me-6">Accueil</a>
                </li>
                <li>
                    <a href="{{ route('about') }}" class="hover:underline me-4 md:me-6">A propos</a>
                </li>
                <li>
                    <a href="{{ route('candidate') }}" class="hover:underline">Candidats</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© {{ now()->year }} <a
                href="{{ route('home') }}" class="hover:underline">{{ config('app.name') }}</a>. Tous droits réservés.</span>
    </div>
</footer>
