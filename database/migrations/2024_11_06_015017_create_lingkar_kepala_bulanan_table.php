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
        Schema::create('lingkar_kepala_bulanans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('balita_id');
            $table->float('lingkarKepalaBulanan');
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
        Schema::dropIfExists('lingkar_kepala_bulanan');
    }
};
