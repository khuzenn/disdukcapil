<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class RincianLoketController extends Controller
{
    public function index()
    {
        $data = Outlet::first();
        return view('/rincian_loket', compact('data'));
    }
}
