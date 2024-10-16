<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('balitas', function (Blueprint $table) {
            $table->id();
            $table->string('namaAnak');
            $table->string('nik');
            $table->string('nkk');
            $table->date('tanggalLahir');
            $table->float('beratBadan');
            $table->float('panjangBadan');
            $table->float('lingkarKepala');
            $table->string('namaAyah');
            $table->string('namaIbu');
            $table->text('alamat');
            $table->string('posyandu');
            $table->date('tanggalPendaftaran');
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balitas');
    }
};
