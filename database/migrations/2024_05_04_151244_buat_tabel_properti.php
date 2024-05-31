<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properti', function (Blueprint $table) {
            $table->increments('id_properti');
            $table->string('nama_properti', 50);
            $table->unsignedBigInteger('harga');
            $table->string('alamat', 100);
            $table->text('deskripsi');
            $table->unsignedSmallInteger('luas');
            $table->unsignedTinyInteger('jumlah_garasi');
            $table->unsignedTinyInteger('jumlah_lantai');
            $table->unsignedTinyInteger('jumlah_kamar_mandi');
            $table->unsignedTinyInteger('jumlah_kamar_tidur');
            $table->enum('status', ['Siap', 'Tertunda', 'Terjual']);
            $table->geography('koordinat', subtype: 'point');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
