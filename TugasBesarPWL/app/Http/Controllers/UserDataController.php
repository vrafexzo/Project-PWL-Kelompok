<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDataController extends Controller
{
    public function show()
    {
        $title = "Roles";
        $roles = Role::all();
        return view('role', compact('title', 'roles'));
    }
}
