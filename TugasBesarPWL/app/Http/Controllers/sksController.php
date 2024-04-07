<?php

namespace App\Http\Controllers;

use App\models\matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
class sksController extends Controller
{
    public function getSks()
    {
        $matakuliahs = matakuliah::all();
        return view('dashboard.posts.usersks', compact('matakuliahs'));
    }

    // Method untuk menyimpan mata kuliah baru
    public function store(Request $request)
    {
        //
    }
}

