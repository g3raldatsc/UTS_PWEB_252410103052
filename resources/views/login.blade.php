@extends('layouts.app')

@section('title', 'Masuk')

@section('content')
<section class="login-kotak">
    <h1 class="judul-besar">PANEL DOJO</h1>
    <p class="subjudul">Rak digital untuk koleksi manga romance favoritmu</p>

    <div class="balon">Isi nama bang.</div>

    <form action="{{ route('login.proses') }}" method="POST" class="form-komik">
        @csrf
        <label for="username">Nama kamu</label>
        <input type="text" id="username" name="username" value="{{ old('username') }}" placeholder="contoh: Excelymok Geyta" autocomplete="off">

        @error('username')
            <p class="pesan-error">{{ $message }}</p>
        @enderror

        <button type="submit" class="tombol">MASUK!</button>
    </form>
</section>
@endsection
