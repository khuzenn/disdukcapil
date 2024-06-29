<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loket;
use App\Models\Purpose;
use App\Models\User;

class LoketController extends Controller
{
    public function index()
    {
        $data = Loket::all();
        return view('/loket/data_loket', compact('data'));
    }

    public function create_loket()
    {
        $purposes = Purpose::all();
        return view('/loket/create_loket', compact('purposes'));
    }

    public function addLoket(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nomor' => 'required|string|max:255',
            'purpose_id' => 'required|exists:purposes,id',
        ]);

        Loket::create($validatedData);

        return redirect()->route('admin.data-loket')->with('success', 'Loket berhasil ditambahkan');
    }

    public function getLoket($id)
    {
        $purposes = Purpose::all();
        $data = Loket::find($id);

        return view('/loket/edit_loket', compact('data', 'purposes'));
    }

    public function updateLoket(Request $request, $id)
    {
        $data = Loket::find($id);

        if (!$data) {
            return redirect()->route('admin.data-loket')->with('error', 'Loket tidak ditemukan');
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'nomor' => 'required|string|max:255',
            'purpose_id' => 'required|exists:purposes,id',
        ]);

        $data->name = $validatedData['name'];
        $data->nomor = $validatedData['nomor'];
        $data->purpose_id = $validatedData['purpose_id'];

        $data->save();

        return redirect()->route('admin.data-loket')->with('success', 'Loket berhasil diupdate');
    }

    public function deleteLoket($id)
    {
        $data = Loket::find($id);
        $data->delete($id);

        return redirect()->route('admin.data-loket')->with('success', 'Loket berhasil dihapus');
    }

    public function showRegistrationForm()
    {
        $lokets = Loket::all();
        return view('store', compact('lokets'));
    }

    // Get user By Loket
    public function getUserLoket($loket_id)
    {
        $users = User::where('loket_id', $loket_id)->with('loket')->get();

        return view('/loket/user_loket', compact('users')); 
    }
}
