<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanjangBadanBulanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'balita_id',
        'panjangBadanBulanan',
        'tanggal',
    ];

    public function balita()
    {
        return $this->belongsTo(Balita::class);
    }
}
