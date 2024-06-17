<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $fillable = [
        'loket_id',
        'purpose_id',
        'nama_outlet',
        'alamat_outlet',
        'no_telp',
        'nomor_antrian',
        'jenis_antrian',
        'keterangan',
        'count',
        'hari',
        'tanggal'
    ];

    public function loket()
    {
        return $this->belongsTo(Loket::class, 'loket_id');
    }

    public function purpose()
    {
        return $this->belongsTo(Purpose::class, 'purpose_id');
    }
}
