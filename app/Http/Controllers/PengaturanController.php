<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class PengaturanController extends Controller
{
    public function indeks(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $pengguna = Auth::user();

        return view('tampilan.pengaturan', [
            'pengguna' => $pengguna
        ]);
    }
}
