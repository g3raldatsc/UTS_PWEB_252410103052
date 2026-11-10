@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<p class="sapaan">Yo, {{ $username }}! Selamat datang kembali di dojo.</p>
<h1 class="judul-halaman">DASHBOARD</h1>

<section class="strip-stat">
    <div>
        <span class="angka">{{ $total }}</span>
        <span class="label">Koleksi</span>
    </div>
    <div>
        <span class="angka">{{ $berjalan }}</span>
        <span class="label">Berlangsung</span>
    </div>
    <div>
        <span class="angka">{{ $tamat }}</span>
        <span class="label">Tamat</span>
    </div>
</section>

<section class="unggulan">
    @if (file_exists(public_path('images/covers/' . $terbaik['cover'])))
        <img class="sampul" src="{{ asset('images/covers/' . $terbaik['cover']) }}" alt="Sampul {{ $terbaik['judul'] }}">
    @else
        <div class="sampul sampul-kosong">Belum ada sampul</div>
    @endif

    <div class="info">
        <p class="tag">REKOMENDASI TERBAIK</p>
        <h2>{{ $terbaik['judul'] }}</h2>
        <p>{{ $terbaik['genre'] }}</p>
        <p>{{ $terbaik['chapter'] }} chapter &bull; {{ $terbaik['status'] }}</p>
        <p class="rating">Rating {{ number_format($terbaik['rating'], 1) }} / 10</p>
        <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="tombol tombol-link">LIHAT KOLEKSI</a>
    </div>
</section>
@endsection
