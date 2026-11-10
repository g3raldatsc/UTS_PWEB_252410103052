<!DOCTYPE html>
<html lang="id">
<head>
    @include('partials.head')
    <title>@yield('title') | Panel Dojo</title>
</head>
<body>
    @if (isset($username))
        <x-navbar :username="$username" />
    @endif

    <main class="wadah">
        @yield('content')
    </main>

    <x-footer />
</body>
</html>
