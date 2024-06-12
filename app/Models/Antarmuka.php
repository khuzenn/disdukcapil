<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antarmuka extends Model
{
    protected $fillable = [
        'name',
        'keterangan',
        'source_youtube',
        'source_local'
    ];
}
