<?php

namespace App\Http\Controllers;

use App\Repositories\PropertiRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PropertiController extends Controller
{
    private PropertiRepository $propertiRepository;

    public function __construct(PropertiRepository $propertiRepository)
    {
        $this->propertiRepository = $propertiRepository;
    }

    public function indeks(): Factory|\Illuminate\Foundation\Application|View|Application
    {
        $properti = $this->propertiRepository->cariSemua();

        return view('tampilan.properti', [
            'properti' => $properti
        ]);
    }
}
