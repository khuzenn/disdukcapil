<?php

namespace App\Http\Controllers;


use App\Models\Outlet;
use App\Models\Antrian;

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
                           'purposes.jenis as jenis_transaksi'
                       ])
                       ->whereNotNull('antrians.loket_id')
                       ->get();

        return response()->json(['data' => $data]);
    }

    public function getAntrian()
{
    $data = Antrian::where('status', 'waiting')
                   ->join('lokets', 'antrians.loket_id', '=', 'lokets.id')
                   ->join('purposes', 'antrians.purpose_id', '=', 'purposes.id')
                   ->select([
                       'purposes.keterangan as jenis_transaksi',
                       'purposes.kode as kode_antrian',
                       DB::raw('COUNT(antrians.id) as jumlah_antrian')
                   ])
                   ->groupBy('purposes.name', 'purposes.kode')
                   ->get();

    return response()->json(['data' => $data]);
}
}