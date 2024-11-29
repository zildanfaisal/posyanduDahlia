<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balita extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaAnak',
        'nik',
        'nkk',
        'tanggalLahir',
        'beratBadanLahir',
        'panjangBadan',
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

    public function panjangBadanBulanan()
    {
        return $this->hasMany(PanjangBadanBulanan::class);
    }

    public function lingkarKepalaBulanan()
    {
        return $this->hasMany(LingkarKepalaBulanan::class);
    }
}
