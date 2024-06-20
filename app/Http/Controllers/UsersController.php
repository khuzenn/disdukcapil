<?php

namespace App\Http\Controllers;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the users.
     *
     * @return \Illuminate\View\View
     */
    
    public function index()
    {
        $users = User::all();
        return view('/users/data_users', compact('users'));
    }

    public function create_users()
    {
        return view('/users/create_user');
    }

    public function destroy(User $user)
    {
        $user->delete();
        
        // Redirect kembali ke halaman index pengguna dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }


}
