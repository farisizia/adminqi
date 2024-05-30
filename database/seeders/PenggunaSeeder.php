<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Pengguna::query()->insert([
            'nama_pengguna' => 'admin',
            'password' => Hash::make('admin'),
            'nama_lengkap' => 'Admin'
        ]);
    }
}
