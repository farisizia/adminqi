<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;

class Pengguna extends User
{
    use HasFactory;

    protected $table = 'pengguna';

    public $timestamps = false;
}
