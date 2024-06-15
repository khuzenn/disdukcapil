<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class DisplayAntrianController extends Controller
{
    public function index()
    {
        $data = Outlet::first();
        return view('display_antrian', compact('data'));
    }
}
