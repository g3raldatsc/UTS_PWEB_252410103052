<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // data manga ini disimpan di controller nya :3
    private function dataManga(): array
{
    return [
        ['judul' => 'Kyou mo Veranda de', 'genre' => 'Romance, Seinen', 'status' => 'Tamat', 'chapter' => 90, 'rating' => 9.7, 'cover' => 'kyou-mo-veranda-de.jpg'],
        ['judul' => 'Aekanaru', 'genre' => 'Romance, Drama', 'status' => 'Tamat', 'chapter' => 41, 'rating' => 9.2, 'cover' => 'aekanaru.jpg'],
        ['judul' => 'Mayonaka Heart Tune', 'genre' => 'Romance, Comedy', 'status' => 'Berlangsung', 'chapter' => 136, 'rating' => 8.7, 'cover' => 'mayonaka-heart-tune.jpg'],
        ['judul' => 'Tonari no Neko to Koi Shirazu', 'genre' => 'Romance, Animals', 'status' => 'Berlangsung', 'chapter' => 38, 'rating' => 9.2, 'cover' => 'tonari-no-neko.jpeg'],
        ['judul' => 'Osoraku Kanojo wa Ore no Aniki wo Neratteru', 'genre' => 'Romance, School Life', 'status' => 'Berlangsung', 'chapter' => 36, 'rating' => 9.0, 'cover' => 'osoraku-kanojo.jpeg'],
        ['judul' => 'Koi to Utatane', 'genre' => 'Romance, Shounen', 'status' => 'Tamat', 'chapter' => 28, 'rating' => 8.5, 'cover' => 'koi-to-utatane.jpg'],
    ];
}

    public function login()
    {
        return view('login');
    }

    public function prosesLogin(Request $request)
    {
        $request->validate([
            'username' => 'required|min:3|max:20',
        ], [
            'username.required' => 'Isi nama kamu dulu!',
            'username.min' => 'Minimal 3 huruf bang!',
            'username.max' => 'Maksimal 20 huruf bang!',
        ]);

        // buat ngirim username ke dashboard lewat request parameter (?username=...)
        return redirect()->route('dashboard', ['username' => $request->username]);
    }

    public function dashboard(Request $request)
    {
        $username = $request->query('username');
        if (!$username) {
            return redirect()->route('login');
        }

        $manga = collect($this->dataManga());

        return view('dashboard', [
            'username'  => $username,
            'total' => $manga->count(),
            'berjalan' => $manga->where('status', 'Berlangsung')->count(),
            'tamat' => $manga->where('status', 'Tamat')->count(),
            'terbaik' => $manga->sortByDesc('rating')->first(),
        ]);
    }

    public function pengelolaan(Request $request)
    {
        $username = $request->query('username');
        if (!$username) {
            return redirect()->route('login');
        }

        return view('pengelolaan', [
            'username' => $username,
            'manga' => $this->dataManga(),
        ]);
    }

    public function profile(Request $request)
    {
        $username = $request->query('username');
        if (!$username) {
            return redirect()->route('login');
        }

        return view('profile', [
            'username' => $username,
            'profil' => [
                'Rank' => 'Mangaka Pemula',
                'Genre Favorit' => 'Romance',
                'Senjata' => 'Amba Sword',
                'Markas' => 'Dojo Panel Utama',
            ],
        ]);
    }
}
