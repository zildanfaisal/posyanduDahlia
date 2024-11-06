<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeratBadanBulanan extends Model
{
    use HasFactory;

    protected $table = 'berat_badan_bulanan';

    protected $fillable = [
        'balita_id',
        'beratBadanBulanan',
        'tanggal',
    ];

    public function balita()
    {
        return $this->belongsTo(Balita::class);
    }
}
