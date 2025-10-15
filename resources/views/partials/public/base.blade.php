<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.public._head')
</head>

<body class="bg-gray-50 dark:bg-gray-900">

    @include('partials.public._navbar')

    @if (isset($isHome))
        @include('partials.public._home-hero')
    @else
        @include('partials.public._other-hero')
    @endif

    @yield('content')

    @include('partials.public._footer')

    @include('partials.public._script')

</body>

</html>
