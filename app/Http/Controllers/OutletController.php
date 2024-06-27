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

        return view('/outlet/edit_outlet', compact('data'));
    }

    public function updateOutlet(Request $request, $id)
    {
        $data = Outlet::find($id);

        if (!$data) {
            return redirect()->route('data-outlet')->with('error', 'Outlet tidak ditemukan');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'no_telp' => 'required|string|max:20',
            'header_color' => 'required|string|max:7',
            'box_display_color' => 'required|string|max:7',
            'box_ambil_color' => 'required|string|max:7',
            'text_color' => 'required|string|max:7',
            'running_text' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5000',
        ]);

        $data->name = $validatedData['name'];
        $data->address = $validatedData['address'];
        $data->no_telp = $validatedData['no_telp'];
        $data->header_color = $validatedData['header_color'];
        $data->box_display_color = $validatedData['box_display_color'];
        $data->box_ambil_color = $validatedData['box_ambil_color'];
        $data->text_color = $validatedData['text_color'];
        $data->running_text = $validatedData['running_text'] ?? null;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('./assets/logo/'), $logoName);
            $data->logo = $logoName;
        }

        $data->save();

        return redirect()->route('data-outlet')->with('success', 'Outlet berhasil diupdate');
    }

    public function deleteOutlet($id)
    {
        $data = Outlet::find($id);
        $data->delete();

        return redirect()->route('admin.data-outlet')->with('success', 'Outlet berhasil dihapus');
    }
}
