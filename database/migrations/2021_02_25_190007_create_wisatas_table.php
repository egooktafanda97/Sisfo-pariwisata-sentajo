<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama_wisata');
            $table->string('alamat');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('koordinat');
            $table->string('gambar');
            $table->string('vidio');
            $table->string('deskripsi');
            $table->string('status_pelestarian');
            $table->integer('_sts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wisata');
    }
}
