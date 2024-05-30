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
}
