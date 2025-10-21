<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.candidate._head')
</head>

<body class="bg-gray-900">

    @include('partials.candidate._navbar')

    <div class="p-4 sm:ml-64">
        @yield('content')
    </div>

    @include('partials.candidate._script')

</body>

</html>
