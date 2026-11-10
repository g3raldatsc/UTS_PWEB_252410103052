@extends('layouts.app')

@section('title', 'Koleksi')

@section('content')
<h1 class="judul-halaman">RAK KOLEKSI</h1>
<p class="sapaan">Rak milik {{ $username }}, berisi {{ count($manga) }} judul.</p>

<section class="grid-manga">
    @foreach ($manga as $item)
        <article class="kartu-manga">
            <span class="nomor">#{{ $loop->iteration }}</span>

            @if (file_exists(public_path('images/covers/' . $item['cover'])))
                <img class="sampul" src="{{ asset('images/covers/' . $item['cover']) }}" alt="Sampul {{ $item['judul'] }}">
            @else
                <div class="sampul sampul-kosong">Belum ada sampul</div>
            @endif

            <div class="isi-kartu">
                <h3>{{ $item['judul'] }}</h3>
                <p class="genre">{{ $item['genre'] }}</p>
                <p>{{ $item['chapter'] }} chapter</p>
                <div class="baris-bawah">
                    <span class="status {{ $item['status'] == 'Tamat' ? 'tamat' : 'jalan' }}">{{ $item['status'] }}</span>
                    <span class="skor">{{ number_format($item['rating'], 1) }}</span>
                </div>
            </div>
        </article>
    @endforeach
</section>
@endsection
