<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaAnak',
        'tanggalLahir',
        'beratBadanLahir',
        'panjangBadanLahir',
        'lingkarKepala',
        'namaAyah',
        'namaIbu',
        'alamat',
        'posyandu',
        'tanggalPendaftaran'
    ];

    public function beratBadanBulanan()
    {
        return $this->hasMany(BeratBadanBulanan::class);
    }
}
