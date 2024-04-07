<?php

namespace App\Http\Controllers;

use App\models\matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class matakuliahController extends Controller
{
    // Method untuk mendapatkan semua mata kuliah
    public function getMK()
    {
        $matakuliahs = matakuliah::all();
        return view('dashboard.posts.index', compact('matakuliahs'));
    }

    // Method untuk menghapus mata kuliah
    public function hapus(matakuliah $matakuliah)
    {
        try {
            $matakuliah->delete();
            return response()->json(['message' => 'Data berhasil dihapus'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus data'], 500);
        }
    }

    // Method untuk menyimpan mata kuliah baru
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'id_mk' => 'required|string|max:16|unique:mata_kuliah',
            'nama_mk' => 'required|string|max:45',
            'sks' => 'required|integer|max:11',
            'kurikulum_id_kurikulum' => 'required|string|max:16'
        ])->validate();

        $matakuliah = matakuliah::create($validatedData);

        return Redirect::to('dashboard/posts')->with('success', 'Mata kuliah berhasil ditambahkan');
    }
}
