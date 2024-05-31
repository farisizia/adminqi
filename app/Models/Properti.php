<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Properti extends Model
{
    use HasFactory;

    protected $table = 'properti';

    public $timestamps = false;

    public function foto(): HasMany
    {
        return $this->hasMany(Foto::class, 'id_properti', 'id_properti');
    }
}
