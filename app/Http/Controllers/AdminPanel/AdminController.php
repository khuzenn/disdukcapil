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
    
    public function deleteAll()
        {
            \App\Models\Antrian::query()->delete(); // This will delete all records in the 'antrians' table
            return redirect()->route('admin.dashboard')->with('success', 'All queues have been deleted.');
        }
}
