<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCagarBudayasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cagar_budaya', function (Blueprint $table) {
            $table->id();
            $table->string('kecamatan');
            $table->string('alamat');
            $table->string('nama_situs');
            $table->string('perkiraan_tahun');
            $table->text('sejarah_singkat');
            $table->string('kategori');
            $table->string('gambar');
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
        Schema::dropIfExists('cagar_budaya');
    }
}
