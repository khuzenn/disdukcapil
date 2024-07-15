<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\Setting;

class DisplayAntrianController extends Controller
{
    public function index()
    {
        $data = Outlet::first();
        $settings = Setting::all();
        return view('display_antrian', compact('data','settings'));
    }
}
