<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    public $timestamps = false;

    public function properti(): BelongsTo
    {
        return $this->belongsTo(Properti::class, 'id_properti', 'id_properti');
    }
}
