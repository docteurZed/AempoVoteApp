<nav class="fixed top-0 z-50 w-full border-b bg-gray-800 border-gray-700">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center p-2 text-sm rounded-lg sm:hidden focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                        </path>
                    </svg>
                </button>
                <a href="{{ route('home') }}" class="flex ms-2 md:me-24">
                    <img src="{{ asset('img/logo.png') }}" class="h-8" alt="Logo" />
                    <span
                        class="self-center text-2xl font-bold sm:text-2xl whitespace-nowrap text-red-700">{{ config('app.name') }}</span>
                </a>
            </div>
            <div class="flex items-center">
                <div class="flex items-center ms-3">
                    <div>
                        <button type="button"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-600 cursor-pointer"
                            aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <span class="sr-only">Open user menu</span>
                            <img class="w-8 h-8 rounded-full"
                                src="{{ isset($profil) ? asset('storage/' . $profil) : asset('img/profil.jpg') }}"
                                alt="user photo">
                        </button>
                    </div>
                    <div class="z-50 hidden my-4 text-base list-none divide-y rounded-sm shadow-sm bg-gray-700 divide-gray-600"
                        id="dropdown-user">
                        <ul class="py-1" role="none">
                            <li>
                                <form action="{{ route('logout') }}" method="post" class="w-full">
                                    @csrf
                                    <button type="submit"
                                        class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 text-white"
                                        role="menuitem">Déconnexion</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full border-r sm:translate-x-0 bg-gray-800 border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{ route('candidat.dashboard') }}"
                    class="{{ request()->routeIs('candidat.dashboard') ? 'text-green-700' : 'text-white' }} flex items-center p-2 rounded-lg hover:bg-gray-700 group">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('candidat.dashboard') ? 'text-green-700' : 'text-gray-400 group-hover:text-white' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5z" />
                    </svg>
                    <span class="ms-3">Tableau de bord</span>
                </a>
            </li>
            <li>
                <a href="{{ route('candidat.infos') }}"
                    class="{{ request()->routeIs('candidat.infos') ? 'text-green-700' : 'text-white' }} flex items-center p-2 rounded-lg hover:bg-gray-700 group">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('candidat.infos') ? 'text-green-700' : 'text-gray-400 group-hover:text-white' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path
                            d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Informations</span>
                </a>
            </li>
            <li>
                <a href="{{ route('candidat.vote') }}"
                    class="{{ request()->routeIs('candidat.vote') ? 'text-green-700' : 'text-white' }} flex items-center p-2 rounded-lg hover:bg-gray-700 group">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('candidat.vote') ? 'text-green-700' : 'text-gray-400 group-hover:text-white' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M13.5 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1h-11a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zm-11-1a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h11a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                        <path
                            d="M6.5 3a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1zm-4 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1zm8 0a1 1 0 0 1 1-1h1a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Campagne</span>
                </a>
            </li>
            <li>
                <a href="{{ route('candidat.media') }}"
                    class="{{ request()->routeIs('candidat.media') ? 'text-green-700' : 'text-white' }} flex items-center p-2 rounded-lg hover:bg-gray-700 group">
                    <svg class="w-5 h-5 transition duration-75 {{ request()->routeIs('candidat.media') ? 'text-green-700' : 'text-gray-400 group-hover:text-white' }}"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                        <path
                            d="M15.384 6.115a.485.485 0 0 0-.047-.736A12.44 12.44 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.52.52 0 0 0 .668.05A11.45 11.45 0 0 1 8 4c2.507 0 4.827.802 6.716 2.164.205.148.49.13.668-.049" />
                        <path
                            d="M13.229 8.271a.482.482 0 0 0-.063-.745A9.46 9.46 0 0 0 8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065A8.46 8.46 0 0 1 8 7a8.46 8.46 0 0 1 4.576 1.336c.206.132.48.108.653-.065m-2.183 2.183c.226-.226.185-.605-.1-.75A6.5 6.5 0 0 0 8 9c-1.06 0-2.062.254-2.946.704-.285.145-.326.524-.1.75l.015.015c.16.16.407.19.611.09A5.5 5.5 0 0 1 8 10c.868 0 1.69.201 2.42.56.203.1.45.07.61-.091zM9.06 12.44c.196-.196.198-.52-.04-.66A2 2 0 0 0 8 11.5a2 2 0 0 0-1.02.28c-.238.14-.236.464-.04.66l.706.706a.5.5 0 0 0 .707 0l.707-.707z" />
                    </svg>
                    <span class="flex-1 ms-3 whitespace-nowrap">Réseaux sociaux</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
