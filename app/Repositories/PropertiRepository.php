<?php

namespace App\Repositories;

use App\Models\Properti;
use Illuminate\Database\Eloquent\Collection;

class PropertiRepository
{
    public function cariSemua(): Collection|array
    {
        $properti = Properti::query()->orderBy('id_properti', 'desc');

        return $properti->get();
    }

    public function cariSatuBerdasarkanIDProperti(int $idProperti): object|null
    {
        $properti = Properti::query()->where('id_properti', '=', $idProperti);

        return $properti->first();
    }

    public function edit(int $idProperti, array $nilai): void
    {
        $properti = Properti::query()->where('id_properti', '=', $idProperti);

        $properti->update($nilai);
    }
}
