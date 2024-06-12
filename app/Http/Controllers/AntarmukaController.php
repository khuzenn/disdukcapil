<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antarmuka;

class AntarmukaController extends Controller
{
    public function index()
    {
        $data = Antarmuka::all();
        return view('/antarmuka/data_antarmuka', compact('data'));
    }

    public function create_antarmuka()
    {
        $data = Antarmuka::all();
        return view('/antarmuka/create_antarmuka', compact('data'));
    }

    public function addAntarmuka(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        $validatedData['source_local'] = null;
        $validatedData['source_youtube'] = null;

        if ($request->keterangan === 'Youtube') {
            $validatedData['source_youtube'] = $request->source_youtube;
            
        } elseif ($request->keterangan === 'Local') {
            $validatedData['source_local'] = $request->file('source_local')->store('antarmukas');
            
        }

        Antarmuka::create($validatedData);

        return redirect()->route('data-antarmuka')->with('success', 'Antarmuka berhasil ditambahkan');
    }

    public function getAntarmuka($id)
    {
        $antarmukas = Antarmuka::all();
        $data = Antarmuka::find($id);

        return view('/antarmuka/edit_antarmuka', compact('data', 'antarmukas'));
    }

    public function updateAntarmuka(Request $request, $id)
    {
        $data = Antarmuka::find($id);

        if (!$data) {
            return redirect()->route('data-antarmuka')->with('error', 'Antarmuka tidak ditemukan');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255|in:youtube,local',
            'source_local' => 'nullable|file',
        ]);

        $validatedData['source_local'] = $request->hasFile('source_local') ? $request->file('source_local')->store('antarmukas') : $data->source_local;
        $validatedData['source_youtube'] = $request->keterangan === 'youtube' ? $request->source_youtube : $data->source_youtube;

        $data->update($validatedData);

        return redirect()->route('data-antarmuka')->with('success', 'Antarmuka berhasil diupdate');
    }


    public function deleteAntarmuka($id)
    {
        $data = Antarmuka::find($id);
        $data->delete();

        return redirect()->route('data-antarmuka')->with('success', 'Loket berhasil dihapus');
    }
}
