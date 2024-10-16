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
        Schema::create('ibu_hamils', function (Blueprint $table) {
            $table->id();
            $table->string('namaIbuHamil');
            $table->string('tempatLahir');
            $table->date('tanggalLahir');
            $table->text('alamat');
            $table->float('beratBadan');
            $table->float('lila'); // Lingkar Lengan Atas
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ibu_hamils');
    }
};
