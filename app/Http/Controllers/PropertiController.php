<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Properti;
use App\Repositories\PropertiRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PropertiController extends Controller
{
    private PropertiRepository $propertiRepository;

    public function __construct(PropertiRepository $propertiRepository)
    {
        $this->propertiRepository = $propertiRepository;
    }

    private function simpanFoto(Request $request, array|UploadedFile|null $foto, object $properti): void
    {
        if ($request->has('foto')) {
            foreach ($foto as $f) {
                $namaFoto = sprintf('%s.%s', Str::random(10), $f->extension());

                $f->storeAs('public/properti', $namaFoto);

                $idProperti = $properti->{'id'};

                $foto = new Foto();

                $foto->{'id_properti'} = $idProperti;
                $foto->{'foto'} = $namaFoto;

                $foto->save();
            }
        }
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

        $foto = $request->file('foto');
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

        DB::beginTransaction();

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

        $this->simpanFoto($request, $foto, $properti);

        DB::commit();

        return to_route('properti');
    }

    public function prosesEdit(Request $request): RedirectResponse
    {
        $idProperti = $request->input('id-properti');
        $foto = $request->file('foto');
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

        $properti = $this->propertiRepository->cariSatuBerdasarkanIDProperti($idProperti);

        if ($properti) {
            $nilai = [
                'nama_properti' => $namaProperti,
                'harga' => $harga,
                'alamat' => $alamat,
                'deskripsi' => $deskripsi,
                'luas' => $luas,
                'jumlah_garasi' => $jumlahGarasi,
                'jumlah_lantai' => $jumlahLantai,
                'jumlah_kamar_mandi' => $jumlahKamarMandi,
                'jumlah_kamar_tidur' => $jumlahKamarTidur,
                'status' => $status
            ];

            $this->simpanFoto($request, $foto, $properti);

            $this->propertiRepository->edit($idProperti, $nilai);
        }

        return to_route('properti');
    }
}
