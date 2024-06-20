<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Loket;
use App\Models\Purpose;

class AdminController extends Controller
{
    public function index(){
        
        $totalLoket = Loket::count();
        $totalPurpose = Purpose::count();

        return view('admin.dashboard', [
            'totalLoket' => $totalLoket,
            'totalPurpose' => $totalPurpose
        ]);
    }
}
