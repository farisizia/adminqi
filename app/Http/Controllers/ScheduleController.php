<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ScheduleController extends Controller
{
    public function indeks(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $jadwal = Jadwal::all();

        return view('components.pages.schedule', [
            'jadwal' => $jadwal
        ]);
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
