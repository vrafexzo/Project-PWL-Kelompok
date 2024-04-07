<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Role;

class RoleController extends Controller
{
    public function showRoles()
    {
        $title = "Roles";
        $roles = Role::all();
        return view('dashboard.posts.admin.role', compact('title', 'roles'));
    }
}
