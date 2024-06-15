<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('/users/data_users');
    }

    public function create_users()
    {
        return view('/users/create_user');
    }
}
