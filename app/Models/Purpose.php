<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    protected $fillable = [
        'kode',
        'jenis',
        'keterangan'
    ];

    public function antrians()
    {
        return $this->hasMany(Antrian::class);
    }

    public function lokets()
    {
        return $this->hasMany(Loket::class, 'purpose_id');
    }
}
