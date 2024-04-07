<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function getUsers() {
        $users = user::all();
        return view('dashboard.posts.admin.register', compact('users'));
    }
    
    function login()
    {
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }
        return view('login2', ['title' => 'Login']);
    }


    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('dashboard'))->with("success", "Login details are not valid");
        }
        return redirect()->route('login')->with("error", "Login details are not valid");
    }

    function registerPost(Request $request)
    {
        $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email|max:30|unique:users',
            'password' => 'required|max:100',
            'role_id' => 'required'
        ]);
        $roleId = $request->role_id;
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role_id_role'] = $roleId;
        $user = User::create($data);
        if (!$user) {
            return redirect()->route('register')->with("error", "Registration failed, try again.");
        }
        return redirect()->route('register')->with("success", "Register success");
    }

    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('login');
    }

    function hapus(user $user) {
        try {
            $user->delete();
            return redirect()->route('register');
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus data'], 500);
        }
    }
}
