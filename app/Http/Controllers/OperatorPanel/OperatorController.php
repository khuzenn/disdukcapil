<?php

namespace App\Http\Controllers\OperatorPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outlet;
use Illuminate\Support\Facades\Auth;

class OperatorController extends Controller
{
    public function index(){
        
        $data = Outlet::first();
        $user = Auth::user();
        $loket = $user->loket;
        $purposeKode = $loket ? $loket->purpose->kode ?? 'N/A' : 'N/A';
        $purposeKeterangan = $loket ? $loket->purpose->keterangan ?? 'N/A' : 'N/A';

        return view('rincian_loket',compact('data','user','loket','purposeKode','purposeKeterangan'));
    }
}
