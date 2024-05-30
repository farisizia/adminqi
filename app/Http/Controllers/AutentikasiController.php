<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutentikasiController extends Controller
{
    public function masuk(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('tampilan.autentikasi.masuk');
    }

    public function prosesMasuk(Request $request): RedirectResponse
    {
        $namaPengguna = $request->input('nama-pengguna');
        $kataSandi = $request->input('kata-sandi');

        if (Auth::attempt(['nama_pengguna' => $namaPengguna, 'password' => $kataSandi])) {
            $request->session()->regenerate();

            return to_route('dasbor');
        }

        return back();
    }
}
