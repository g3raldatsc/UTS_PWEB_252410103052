@extends('layouts.app')

@section('title', 'Profil')

@section('content')
<h1 class="judul-halaman">KARTU IDENTITAS</h1>

<section class="kartu-profil">
    @if (file_exists(public_path('images/pp_istriku.jpg')))
        <img class="avatar" src="{{ asset('images/pp_istriku.jpg') }}" alt="Foto {{ $username }}">
    @else
        <div class="avatar avatar-huruf">{{ strtoupper(substr($username, 0, 1)) }}</div>
    @endif

    <div class="data-profil">
        <h2>{{ $username }}</h2>
        <dl>
            @foreach ($profil as $label => $isi)
                <div class="baris-profil">
                    <dt>{{ $label }}</dt>
                    <dd>{{ $isi }}</dd>
                </div>
            @endforeach
        </dl>
        <a href="{{ route('pengelolaan', ['username' => $username]) }}" class="tombol tombol-link">KE RAK KOLEKSI</a>
    </div>
</section>
@endsection
