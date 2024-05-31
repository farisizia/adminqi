<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;

class Properti extends Model
{
    use HasFactory, HasSpatial;

    protected $table = 'properti';

    protected $casts = [
        'koordinat' => Point::class
    ];

    public $timestamps = false;

    public function foto(): HasMany
    {
        return $this->hasMany(Foto::class, 'id_properti', 'id_properti');
    }
}
