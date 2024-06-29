<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\Loket;
use App\Models\Purpose;
use App\Models\Antrian;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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

    public function antrianAktif()
    {
        $data = Antrian::where('status', 'called')
            ->join('lokets', 'antrians.loket_id', '=', 'lokets.id')
            ->join('purposes', 'antrians.purpose_id', '=', 'purposes.id')
            ->select([
                DB::raw('CONCAT(purposes.kode, LPAD(antrians.nomor_antrian, 3, "0")) as nomor_antrian'),
                'lokets.nomor as nomor_loket',
                'lokets.name as jenis_transaksi'
            ])
            ->orderBy('antrians.created_at', 'desc') // Order by the latest called
            ->first(); // Get the latest one

        return response()->json($data);
    }

    public function getAntrian()
    {
        $data = Antrian::join('lokets', 'antrians.loket_id', '=', 'lokets.id')
                       ->join('purposes', 'antrians.purpose_id', '=', 'purposes.id')
                       ->select([
                           'lokets.name as jenis_transaksi',
                           'purposes.kode as kode_antrian',
                           DB::raw('count(antrians.loket_id) as jumlah_antrian')
                       ])
                       ->groupBy('lokets.name', 'purposes.kode')
                       ->get();

        return DataTables::of($data)->make(true);
    }

    public function getAntrianAktifData()
    {
        $antrian = Antrian::where('status', 'called')
            ->join('lokets', 'antrians.loket_id', '=', 'lokets.id')
            ->join('purposes', 'antrians.purpose_id', '=', 'purposes.id')
            ->select([
                DB::raw('CONCAT(purposes.kode, LPAD(antrians.nomor_antrian, 3, "0")) as nomor_antrian'),
                'lokets.nomor as nomor_loket',
                'lokets.name as jenis_transaksi'
            ])
            ->orderBy('antrians.created_at', 'desc') // Order by the latest called
            ->first(); // Get the latest one

        return response()->json($antrian);
    }

    public function getAntrianData()
    {
        $antrians = Antrian::all();
        return DataTables::of($antrians)
            ->addColumn('kode_antrian', function($row) {
                return $row->id;
            })
            ->addColumn('jumlah_antrian', function($row) {
                return Antrian::where('loket_id', $row->loket_id)->count();
            })
            ->make(true);
    }

    public function panggilAntrian(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        $user = Auth::user();
        $loket = $user->loket;
        $antrian = Antrian::where('loket_id', $loket->id)
                          ->where('status', 'waiting')
                          ->orderBy('created_at')
                          ->first();

        if ($antrian) {
            $antrian->status = 'called';
            $antrian->save();

            return response()->json([
                'nomor_loket' => $loket->nomor,
                'antrian_sebelumnya' => $antrian->nomor_antrian,
                'antrian_panggil' => $antrian->nomor_antrian,
                'nomor_antrian' => $antrian->nomor_antrian,
            ]);
        } else {
            return response()->json(['message' => 'Tidak ada antrian yang tersedia'], 404);
        }
    }

    public function actionPanggil(Request $request)
    {
        $request->validate([
            'nomor_antrian' => 'required|exists:antrians,nomor_antrian'
        ]);

        $antrian = Antrian::where('nomor_antrian', $request->nomor_antrian)->first();
        
        if ($antrian) {
            // Your logic to call the number
            return response()->json(['status_code' => 200]);
        } else {
            return response()->json(['message' => 'Antrian tidak ditemukan'], 404);
        }
    }
}
