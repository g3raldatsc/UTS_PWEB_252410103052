@props(['username'])

<nav class="navbar">
    <a class="logo" href="{{ route('dashboard', ['username' => $username]) }}">PANEL DOJO</a>

    <input type="checkbox" id="menu-toggle" class="menu-toggle">
    <label for="menu-toggle" class="menu-icon">☰</label>

    <ul class="menu">
        <li><a href="{{ route('dashboard', ['username' => $username]) }}" class="{{ request()->routeIs('dashboard') ? 'aktif' : '' }}">Dashboard</a></li>
        <li><a href="{{ route('pengelolaan', ['username' => $username]) }}" class="{{ request()->routeIs('pengelolaan') ? 'aktif' : '' }}">Koleksi</a></li>
        <li><a href="{{ route('profile', ['username' => $username]) }}" class="{{ request()->routeIs('profile') ? 'aktif' : '' }}">Profil</a></li>
        <li><a href="{{ route('login') }}" class="keluar">Keluar</a></li>
    </ul>
</nav>
