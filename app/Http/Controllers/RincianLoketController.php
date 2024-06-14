<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RincianLoketController extends Controller
{
    public function index()
    {
        return view('/rincian_loket');
    }
}
