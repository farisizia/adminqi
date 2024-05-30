<?php

namespace App\Http\Controllers;

use App\Repositories\PenggunaRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengaturanController extends Controller
{
    private PenggunaRepository $penggunaRepository;

    public function __construct(PenggunaRepository $penggunaRepository)
    {
        $this->penggunaRepository = $penggunaRepository;
    }

    public function indeks(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $pengguna = Auth::user();

        return view('tampilan.pengaturan', [
            'pengguna' => $pengguna
        ]);
    }

    public function prosesEdit(Request $request)
    {
        $id = Auth::user()->getAuthIdentifier();

        $pengguna = $this->penggunaRepository->cariSatuBerdasarkanID($id);

        if ($pengguna) {
            $nilai = [];

            $nilai['nama_lengkap'] = $request->input('nama-lengkap');

            if ($request->has('kata-sandi')) {
                $nilai['password'] = Hash::make($request->input('kata-sandi'));
            }

            $this->penggunaRepository->edit($id, $nilai);

            return to_route('pengaturan');
        }

        abort(404);
    }
}
