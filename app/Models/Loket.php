<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loket extends Model
{
    protected $fillable = [
        'name',
        'nomor',
        'purpose_id'
    ];

    public function purpose()
    {
        return $this->belongsTo(Purpose::class, 'purpose_id');
    }

    public function antrians()
    {
        return $this->hasMany(Antrian::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function getLoket()
    {
        return $this->belongsTo(User::class,'loket_id');
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
