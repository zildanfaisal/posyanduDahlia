<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('panjang_badan_bulanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('balita_id');
            $table->float('panjangBadanBulanan');
            $table->date('tanggal');
            $table->timestamps();

            $table->foreign('balita_id')->references('id')->on('balitas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panjang_badan_bulanan');
    }
};
