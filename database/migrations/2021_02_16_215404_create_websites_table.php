<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website', function (Blueprint $table) {
            $table->id();
            $table->string('web_name',300);
            $table->text('web_meta');
            $table->string('owner',100);
            $table->string('domain',100);
            $table->string('super_admin',100);
            $table->string('logo',100);
            $table->text('dashboard_image');
            $table->text('dashboard_title');
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
        Schema::dropIfExists('website');
    }
}
