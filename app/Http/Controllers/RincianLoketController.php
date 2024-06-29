<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\Antrian;
use App\Models\Purpose;
use Illuminate\Support\Facades\Auth;
use DB;

class RincianLoketController extends Controller
{
    public function index()
    {
        $data = Outlet::first();
        return view('/rincian_loket', compact('data'));
    }

    public function antrianAktif()
    {
        $data = Antrian::join('lokets', 'antrians.loket_id', '=', 'lokets.id')
                       ->join('purposes', 'antrians.purpose_id', '=', 'purposes.id')
                       ->select([
                           DB::raw('CONCAT(purposes.kode, LPAD(antrians.nomor_antrian, 3, "0")) as nomor_antrian'),
                           'lokets.nomor as nomor_loket',
                           'lokets.name as jenis_transaksi'
                       ])
                       ->get();

        return response()->json(['data' => $data]);
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

        return response()->json(['data' => $data]);
    }
}