<?php

namespace App\Repositories;

use App\Models\Pengguna;

class PenggunaRepository
{
    public function cariSatuBerdasarkanID(int $id): object|null
    {
        $pengguna = Pengguna::query()->where('id', '=', $id);

        return $pengguna->first();
    }

    public function edit(int $id, array $nilai): void
    {
        $pengguna = Pengguna::query()->where('id', '=', $id);

        $pengguna->update($nilai);
    }
}
