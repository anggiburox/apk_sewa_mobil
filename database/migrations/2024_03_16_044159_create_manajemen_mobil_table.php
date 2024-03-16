<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manajemen_mobil', function (Blueprint $table) { 
            $table->increments('ID_Mobil');
            $table->string('Merk',20)->nullable();
            $table->string('Model',20)->nullable();
            $table->string('Nomor_Plat',20)->nullable();
            $table->string('Tarif_Sewa_Mobil',20)->nullable();
            $table->string('Foto_Mobil',100)->nullable();
            $table->string('Status_Mobil',20)->nullable();
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
        Schema::dropIfExists('manajemen_mobil');
    }
};
