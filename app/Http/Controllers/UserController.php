<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate();
        $title = 'Users';

        return view('users.index', compact('users', 'title'));
    }
}
