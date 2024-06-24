<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules;
use App\Models\Loket;
use Illuminate\Validation\Rule;


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

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users')
            ->with('success', 'User deleted successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $lokets = Loket::all();
        return view('/users/edit_user', compact('user','lokets'));
    }

    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $rules = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
        'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
        'role' => ['required', 'string', 'in:operator,admin'],
        'photo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
        'loket_id' => ['nullable', 'exists:lokets,id'],
    ];

    // Hanya tambahkan validasi password jika ada input password baru
    if ($request->filled('password')) {
        $rules['password'] = ['required', 'confirmed', Rules\Password::defaults()];
    }

    $request->validate($rules);

    // Proses update user
    $user->name = $request->name;
    $user->email = $request->email;
    $user->username = $request->username;
    $user->role = $request->role;
    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('profile_photos', 'public');
        $user->update(['photo' => $path]);
    }
    $user->loket_id = $request->loket_id;

    // Update password jika ada input password baru
    if ($request->filled('password')) {
        $user->password = bcrypt($request->password);
    }

    $user->save();

    return redirect()->route('users')->with('success', 'Outlet berhasil ditambahkan');
}
}
