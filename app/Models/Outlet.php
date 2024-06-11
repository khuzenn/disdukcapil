<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $fillable = [
        'name',
        'address',
        'no_telp',
        'logo',
        'header_color',
        'box_display_color',
        'box_ambil_color',
        'text_color',
        'running_text'
    ];
}
