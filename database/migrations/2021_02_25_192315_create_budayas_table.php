<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBudayasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('budaya', function (Blueprint $table) {
            $table->id();
            $table->string('nama_budaya');
            $table->text('sejarah_singkat');
            $table->string('alamat_asal');
            $table->string('kecamatan');
            $table->string('desa');
            $table->string('gambar');
            $table->string('vidio');
            $table->text('deskripsi');
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
        Schema::dropIfExists('budaya');
    }
}
