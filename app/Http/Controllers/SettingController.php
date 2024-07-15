<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Loket;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $lokets = Loket::all();
        $settings = Setting::all()->keyBy('box');

        return view('settings.index', compact('lokets', 'settings'));
    }

    public function store(Request $request)
{
    foreach (range(1, 4) as $box) {
        if ($request->{'box_' . $box}) {
            Setting::updateOrCreate(
                ['box' => 'box_' . $box],
                ['loket_id' => $request->{'box_' . $box}]
            );
        } else {
            Setting::where('box', 'box_' . $box)->delete();
        }
    }

    return redirect()->back()->with('success', 'Settings updated successfully.');
}
}

