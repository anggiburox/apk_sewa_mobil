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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->string('ID_Pengguna',20)->primary();
            $table->string('Nama_Pengguna',20)->nullable();
            $table->text('Alamat_Pengguna')->nullable();
            $table->string('Nomor_Telepon_Pengguna',20)->nullable();
            $table->string('Nomor_SIM_Pengguna',20)->nullable();
            $table->string('Email',20)->nullable();
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
        Schema::dropIfExists('pengguna');
    }
};
