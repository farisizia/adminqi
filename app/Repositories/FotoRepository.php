<?php

namespace App\Repositories;

use App\Models\Foto;

class FotoRepository
{
    public function hapus(int $idProperti): void
    {
        $foto = Foto::query()->where('id_properti', '=', $idProperti);

        $foto->delete();
    }
}
