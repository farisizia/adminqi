<?php

namespace App\Repositories;

use App\Models\Jadwal;
use Illuminate\Database\Eloquent\Collection;

class JadwalRepository
{
    public function cariSemua(): Collection|array
    {
        $jadwal = Jadwal::query()->orderBy('id_jadwal', 'desc');

        return $jadwal->get();
    }

    public function cariSatuBerdasarkanIDJadwal(int $idJadwal): object|null
    {
        $jadwal = Jadwal::query()->where('id_jadwal', '=', $idJadwal);

        return $jadwal->first();
    }

    public function hapus(int $idJadwal): void
    {
        $jadwal = Jadwal::query()->where('id_jadwal', '=', $idJadwal);

        $jadwal->delete();
    }

    public function edit(int $idJadwal, array $nilai): void
    {
        $jadwal = Jadwal::query()->where('id_jadwal', '=', $idJadwal);

        $jadwal->update($nilai);
    }
}
