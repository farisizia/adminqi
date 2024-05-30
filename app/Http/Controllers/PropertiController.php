<?php

namespace App\Http\Controllers;

use App\Models\Properti;
use App\Repositories\PropertiRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;
use Illuminate\Support\Str;

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

    public function prosesTambah(Request $request): RedirectResponse
    {
        $request->validate([
            'nama-properti' => [
                'required',
                'string',
                'max:50'
            ],
            'harga' => [
                'required',
                'numeric'
            ],
            'status' => [
                'required',
                'in:Siap,Tertunda,Terjual'
            ],
            'alamat' => [
                'required',
                'string',
                'max:100'
            ],
            'deskripsi' => [
                'required',
                'string'
            ],
            'luas' => [
                'required',
                'numeric'
            ],
            'garasi' => [
                'required',
                'numeric'
            ],
            'kamar-tidur' => [
                'required',
                'numeric'
            ],
            'kamar-mandi' => [
                'required',
                'numeric'
            ],
            'lantai' => [
                'required',
                'numeric'
            ]
        ]);

        $namaProperti = $request->input('nama-properti');
        $harga = $request->input('harga');
        $status = $request->input('status');
        $alamat = $request->input('alamat');
        $deskripsi = $request->input('deskripsi');
        $luas = $request->input('luas');
        $jumlahGarasi = $request->input('garasi');
        $jumlahKamarTidur = $request->input('kamar-tidur');
        $jumlahKamarMandi = $request->input('kamar-mandi');
        $jumlahLantai = $request->input('lantai');

        $properti = new Properti();

        $properti->{'nama_properti'} = $namaProperti;
        $properti->{'harga'} = $harga;
        $properti->{'alamat'} = $alamat;
        $properti->{'deskripsi'} = $deskripsi;
        $properti->{'luas'} = $luas;
        $properti->{'jumlah_garasi'} = $jumlahGarasi;
        $properti->{'jumlah_lantai'} = $jumlahLantai;
        $properti->{'jumlah_kamar_mandi'} = $jumlahKamarMandi;
        $properti->{'jumlah_kamar_tidur'} = $jumlahKamarTidur;
        $properti->{'status'} = $status;

        $properti->save();

        return to_route('properti');
    }
}
