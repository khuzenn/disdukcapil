<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purpose;
use App\Models\Loket;

class PurposeController extends Controller
{
    public function index()
    {
        $data = Purpose::all();
        return view('/purpose/purpose', compact('data'));
    }

    public function create_purpose()
    {
        return view('/purpose/create_purpose');
    }

    public function addPurpose(Request $request)
    {
        $validatedData = $request->validate([
            'kode' => 'required|string|max:10',
            'jenis' => 'required|string|max:100',
            'keterangan' => 'required|string|max:255',
        ]);

        Purpose::create($validatedData);

        return redirect()->route('purpose')->with('success', 'Tujuan Outlet Berhasil Ditambahkan');
    }

    public function getPurpose($id)
    {
        $data = Purpose::find($id);

        return view('/purpose/edit_purpose', compact('data'));
    }

    public function updatePurpose(Request $request, $id)
    {
        $data = Purpose::find($id);

        if (!$data) {
            return redirect()->route('purpose')->with('error', 'Tujuan Loket tidak ditemukan');
        }

        $validatedData = $request->validate([
            'kode' => 'required|string|max:10',
            'jenis' => 'required|string|max:100',
            'keterangan' => 'required|string|max:255',
        ]);

        $data->kode = $validatedData['kode'];
        $data->jenis = $validatedData['jenis'];
        $data->keterangan = $validatedData['keterangan'];

        $data->save();

        return redirect()->route('purpose')->with('success', 'Tujuan Loket berhasil diupdate');
    }

    public function deletePurpose($id)
    {
        $data = Purpose::find($id);
        $data->delete();

        return redirect()->route('purpose')->with('success', 'Tujuan Loket berhasil dihapus');
    }

    public function getDataLoket($purpose_id)
    {
        $data = Loket::where('purpose_id', $purpose_id)->get();
    
        return view('/purpose/purpose_by_loket', compact('data'));
    }
}
