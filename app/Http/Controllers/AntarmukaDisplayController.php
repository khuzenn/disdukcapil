<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AntarmukaDisplayController extends Controller
{
    public function index()
    {
        return view('/antarmuka_display');
    }
}
