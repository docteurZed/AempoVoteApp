<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.public._head')
</head>

<body class="bg-gray-900">

    @include('partials.public._navbar')

    @yield('content')

    @include('partials.public._script')

</body>

</html>
