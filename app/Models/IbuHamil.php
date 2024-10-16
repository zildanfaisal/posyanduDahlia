<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IbuHamil extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaIbuHamil',
        'tempatLahir',
        'tanggalLahir',
        'alamat',
        'beratBadan',
        'lila'
    ];
}
