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
}
