<section
    class="bg-center bg-no-repeat bg-[url({{ asset('img/bg.jpg') }})] bg-gray-800 bg-cover bg-blend-multiply">
    <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56 md:px-16">
        <h1 class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-white md:text-5xl">
            Bienvenue sur la plateforme électorale de l'AEMPO Lomé
        </h1>
        <p class="mb-8 font-normal text-gray-300 lg:text-xl sm:px-16">
            Cette plateforme a été mise en place pour garantir la transparence, la participation et la fluidité du processus électoral au sein de l’AEMPO-Lomé. 
            Découvrez les candidats, leurs programmes et suivez chaque étape des élections en toute simplicité.
        </p>
        <div class="flex flex-col space-y-4 sm:flex-row sm:justify-center sm:space-y-0">
            <a href="{{ route('candidate') }}"
                class="inline-flex justify-center items-center text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-800 font-semibold rounded-lg text-sm px-4 py-3 text-center">
                Découvrir les candidats
                <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>
</section>
