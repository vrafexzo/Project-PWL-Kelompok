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

    public function submitForm(Request $request)
    {
        // Validasi form jika diperlukan
        $request->validate([
            // Atur validasi sesuai kebutuhan
        ]);

        // Simpan data pemilihan ke dalam tabel polling_detail
        foreach ($request->input('id-sks') as $mataKuliahId) {
            PollingDetail::create([
                'id_polling_detail' => uniqid(), // ID polling detail bisa digenerate sesuai kebutuhan
                'nama_polling_detail' => 'Nama polling detail', // Ganti dengan nama polling detail yang sesuai
                'users_id' => auth()->user()->id,
                'polling_id_polling' => $request->input('polling_id'),
                'mata_kuliah_id_mk' => $mataKuliahId
            ]);
        }

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('dashboard.posts.usersks');
    }

}

