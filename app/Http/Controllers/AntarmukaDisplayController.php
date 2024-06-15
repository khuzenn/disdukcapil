<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\Loket;
use App\Models\Purpose;

class AntarmukaDisplayController extends Controller
{
    public function index()
    {
        $data = Outlet::first();
        $lokets = Loket::all();
        return view('/antarmuka_display', compact('data', 'lokets'));
    }

    public function ambil_antrian(Request $request)
    {
        $purpose = Purpose::first();
        $loket = Loket::first();

        return response()->json($data);
    }
}
