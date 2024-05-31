<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Repositories\JadwalRepository;
use App\Repositories\PropertiRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    private JadwalRepository $jadwalRepository;
    private PropertiRepository $propertiRepository;

    public function __construct(JadwalRepository $jadwalRepository, PropertiRepository $propertiRepository)
    {
        $this->jadwalRepository = $jadwalRepository;
        $this->propertiRepository = $propertiRepository;
    }

    public function indeks(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $jadwal = $this->jadwalRepository->cariSemua();
        $properti = $this->propertiRepository->cariSemua();

        return view('tampilan.jadwal', [
            'jadwal' => $jadwal,
            'properti' => $properti
        ]);
    }

    public function prosesTambah(Request $request): RedirectResponse
    {
        $properti = $request->input('properti');
        $tanggal = $request->input('tanggal');
        $pukul = $request->input('pukul');
        $catatan = $request->input('catatan');

        $jadwal = new Jadwal();

        $jadwal->{'id_properti'} = $properti;
        $jadwal->{'tanggal'} = $tanggal;
        $jadwal->{'pukul'} = $pukul;
        $jadwal->{'catatan'} = $catatan;

        $jadwal->save();

        return to_route('jadwal');
    }

    public function prosesEdit(Request $request): RedirectResponse
    {
        $idJadwal = $request->input('id-jadwal');

        $jadwal = $this->jadwalRepository->cariSatuBerdasarkanIDJadwal($idJadwal);

        if ($jadwal) {
            $this->jadwalRepository->edit($idJadwal, [
                'diterima' => true
            ]);
        }

        return to_route('jadwal');
    }

    public function hapus(int $idJadwal)
    {
        $jadwal = $this->jadwalRepository->cariSatuBerdasarkanIDJadwal($idJadwal);

        if ($jadwal) {
            $this->jadwalRepository->hapus($idJadwal);

            return to_route('jadwal');
        }

        abort(404);
    }
}
