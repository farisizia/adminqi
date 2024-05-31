<?php

namespace App\Http\Controllers;

use App\Models\Data_User;
use App\Models\Jadwal;
use App\Models\Property;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function indeks(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $jadwal = Jadwal::all();

        $pengguna = Data_User::all();
        $properti = Property::all();

        return view('components.pages.schedule', [
            'jadwal' => $jadwal,
            'pengguna' => $pengguna,
            'properti' => $properti
        ]);
    }

    public function tambah(Request $request): RedirectResponse
    {
        $pengguna = $request->input('pengguna');
        $properti = $request->input('properti');
        $tanggal = $request->input('tanggal');
        $pukul = $request->input('pukul');
        $catatan = $request->input('catatan');

        $jadwal = new Jadwal();

        $jadwal->{'id_pengguna'} = $pengguna;
        $jadwal->{'id_properti'} = $properti;
        $jadwal->{'tanggal'} = $tanggal;
        $jadwal->{'pukul'} = $pukul;
        $jadwal->{'catatan'} = $catatan;

        $jadwal->save();

        return to_route('schedule');
    }

    public function update(int $id, Request $request)
    {
        $jadwal = Jadwal::query()->where('id_jadwal', '=', $id);

        if ($jadwal) {
            $jadwal->update([
                'jadwal_diterima' => true
            ]);
        }

        return to_route('schedule');
    }

    public function hapus(int $id): RedirectResponse
    {
        $jadwal = Jadwal::query()->where('id_jadwal', '=', $id);

        if ($jadwal->first()) {
            $jadwal->delete();
        }

        return to_route('schedule');
    }
}
