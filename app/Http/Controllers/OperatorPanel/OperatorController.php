<?php

namespace App\Http\Controllers\OperatorPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outlet;

class OperatorController extends Controller
{
    public function index(){
        
        $data = Outlet::first();
        return view('rincian_loket',compact('data'));
    }
}
