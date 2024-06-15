<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisplayAntrianController extends Controller
{
    public function index()
    {
        return view('display_antrian');
    }
}
