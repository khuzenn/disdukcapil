<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['box', 'loket_id'];

    public function loket()
    {
        return $this->belongsTo(Loket::class);
    }

    public function purpose()
    {
        return $this->belongsTo(Purpose::class);
    }
}
