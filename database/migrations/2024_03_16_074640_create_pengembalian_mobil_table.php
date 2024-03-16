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
        Schema::create('pengembalian_mobil', function (Blueprint $table) {
            $table->increments('ID_Pengembalian_Mobil');
            $table->string('ID_Peminjaman_Mobil',20)->nullable();
            $table->string('ID_Pengguna',20)->nullable();
            $table->string('ID_Mobil',20)->nullable();
            $table->date('Tanggal_Pengembalian')->nullable();
            $table->string('Total_Harga',20)->nullable();
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
        Schema::dropIfExists('pengembalian_mobil');
    }
};
