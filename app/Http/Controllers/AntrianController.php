<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\Loket;
use App\Models\Purpose;
use App\Models\Antrian;

class AntrianController extends Controller
{
    public function index()
    {
        $data = Outlet::first();
        $lokets = Loket::all();
        return view('/antarmuka_display', compact('data', 'lokets')); 
    }

    public function createAntrian(Request $request)
    {
        $validate = $request->validate([
            'id_antrian' => 'required|exists:lokets,id'
        ]);

        $loket = Loket::find($validate['id_antrian']);

        $antrian = Antrian::create([
            'loket_id' => $loket->id,
            'purpose_id' => $loket->purpose->id, 
            'nama_outlet' => 'DISDUKCAPIL MARINGIN',
            'alamat_outlet' => 'Jl. Letjen S. Parman No.7 3, RT.3/RW.8, Tomang, Kec. Grogol petamburan, Kota Jakarta Barat',
            'no_telp' => '(021) 5662400',
            'nomor_antrian' => Antrian::where('loket_id', $loket->id)->count() + 1,
            'jenis_antrian' => $loket->purpose->jenis,
            'keterangan' => $loket->purpose->keterangan,
            'count' => Antrian::where('loket_id', $loket->id)->count() + 1,
            'hari' => now()->format('1'),
            'tanggal' => now()->toDateString()
        ]);

        return response()->json($antrian);
    }
}
