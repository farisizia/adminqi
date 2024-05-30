<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ScheduleController extends Controller
{
    public function indeks(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $jadwal = Jadwal::all();

        return view('components.pages.schedule', [
            'jadwal' => $jadwal
        ]);
    }
}
