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
    function login() {
        if(Auth::check()) {
            return redirect(route('home')); 
        }
        return view('login', ['title' => 'Login']);
    }

    function register() {
        if(Auth::check()) {
            return redirect(route('home')); 
        }
        return view('register', ['title' => 'Register']);
    }

    function loginPost(Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->intended(route('home'))->with("success", "Login details are not valid");
        }
        return redirect(route('login'))->with("error", "Login details are not valid"); 
    }

    function registerPost(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        $roleId = 2; 
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['role_id_role'] = $roleId;
        $user = User::create($data);
        if(!$user) {
            return redirect(route('register'))->with("error", "Registration failed, try again."); 
        }
        return redirect(route('login'))->with("success", "Register success, Login to access the app."); 
    }

    function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

}
