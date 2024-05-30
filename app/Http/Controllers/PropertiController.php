<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PropertiController extends Controller
{
    public function indeks(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        return view('tampilan.properti');
    }
}
