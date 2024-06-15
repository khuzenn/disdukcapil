<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Display extends Model
{
    protected $fillable = [
        'name',
        'nomor',
        'purpose_id',
        'loket_id'
    ];

    public function purpose()
    {
        return $this->belongsTo(Purpose::class, 'purpose_id');
    }

    public function loket()
    {
        return $this->belongsTo(Loket::class, 'loket_id');
    }
}
