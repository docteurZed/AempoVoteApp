@extends('partials.member.base')

@section('content')
    <section class="container mx-auto max-w-screen-xl px-6 py-12 text-center">

        @if ($now < $start)
            {{-- Vote non encore commencé --}}
            <h2 class="text-3xl font-extrabold text-white mb-4">Le vote n'a pas encore commencé</h2>
            <p class="text-gray-400 mb-6">
                Il est prévu pour le <span class="font-semibold text-green-500">{{ $start->format('d M Y') }}</span>.
            </p>
            <div id="countdown" class="text-2xl font-bold text-red-600"></div>

            <script>
                const countdownDate = new Date("{{ $start }}").getTime();

                const interval = setInterval(function() {
                    const now = new Date().getTime();
                    const distance = countdownDate - now;

                    if (distance <= 0) {
                        clearInterval(interval);
                        location.reload(); // recharge la page pour afficher le formulaire de vote
                    }

                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    document.getElementById("countdown").innerHTML =
                        days + "j " + hours + "h " + minutes + "m " + seconds + "s";
                }, 1000);
            </script>
        @elseif($now > $end)
            {{-- Vote terminé --}}
            <h2 class="text-3xl font-extrabold text-red-600 mb-4">Le vote est terminé</h2>
            <p class="text-gray-400">
                Merci pour votre participation. Les résultats seront bientôt disponibles.
            </p>
        @endif

    </section>
@endsection
