<section
    class="bg-center bg-no-repeat bg-[url({{ asset('img/bg.jpg') }})] bg-gray-800 bg-cover bg-blend-multiply">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-12 lg:py-24">
        <h1 class="text-2xl font-extrabold text-white mb-2">{{ $pageTitle }}</h1>
        <nav class="flex justify-center mb-6" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li>
                    <a href="{{ route('home') }}"
                        class="text-white hover:text-green-700 text-sm md:text-lg font-semibold">Accueil</a>
                </li>
                <li>
                    <span class="text-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                            class="w-3 h-3" viewBox="0 0 16 16">
                            <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z"/>
                        </svg>
                    </span>
                </li>
                <li aria-current="page" class="text-green-700 font-semibold text-sm md:text-lg">{{ $pageName }}</li>
            </ol>
        </nav>
    </div>
</section>
