<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Outlet;

class OutletController extends Controller
{
    public function index()
    {
        $data = Outlet::all();
        return view('/outlet/data_outlet', compact('data'));
    }

    public function create_outlet()
    {
        return view('/outlet/create_outlet');
    }

    public function addOutlet(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'header_color' => 'required|string|max:7',
            'box_display_color' => 'required|string|max:7',
            'box_ambil_color' => 'required|string|max:7',
            'text_color' => 'required|string|max:7',
            'running_text' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('./assets/logo/'), $logoName);
            $validatedData['logo'] = $logoName;
        }

        Outlet::create($validatedData);

        return redirect()->route('data-outlet')->with('success', 'Outlet berhasil ditambahkan');
    }

    public function getOutlet($id)
    {
        $data = Outlet::find($id);
        // dd($data);

        return view('/outlet/edit_outlet', compact('data'));
    }
}
