<nav class="w-full z-20 top-0 start-0 border-b border-gray-800">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('img/logo.png') }}" class="h-12" alt="Logo">
            <span class="self-center text-2xl font-bold whitespace-nowrap text-red-600">{{ config('app.name') }}</span>
        </a>
        <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            @if (!request()->routeIs('member.vote'))
                <a href="{{ route('member.vote') }}"
                class="text-white hover:bg-green-700 focus:ring-4 focus:outline-none font-semibold rounded-lg text-sm px-4 py-3 text-center bg-green-600 focus:ring-green-800">Voter
                maintenant</a>
            @endif
            <button data-collapse-toggle="navbar-sticky" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600"
                aria-controls="navbar-sticky" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
        </div>
        <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
            <ul
                class="flex flex-col p-4 md:p-0 mt-4 font-medium border rounded-lg md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 bg-gray-800 md:bg-gray-900 border-gray-700">

                @php
                    $active =
                        'block py-2 px-3 text-green-600 rounded-sm md:bg-transparent md:text-green-600 md:p-0 font-semibold hover:bg-gray-700 md:hover:bg-transparent';

                    $inactive =
                        'block py-2 px-3 rounded-sm md:hover:bg-transparent md:hover:text-green-700 md:p-0 md:hover:text-green-500 text-white hover:bg-gray-700 hover:text-white md:hover:bg-transparent border-gray-700 font-semibold';
                @endphp

                <li>
                    <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? $active : $inactive }}">
                        Accueil
                    </a>
                </li>

                <li>
                    <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? $active : $inactive }}">
                        A propos
                    </a>
                </li>

                <li>
                    <a href="{{ route('candidate') }}"
                        class="{{ request()->routeIs('candidate*') ? $active : $inactive }}">
                        Candidats
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
