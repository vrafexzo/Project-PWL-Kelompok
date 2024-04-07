<?php

namespace App\Http\Controllers;

use App\Models\kuri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class kuriController extends Controller
{

    public function getKuris()
    {
        $kuris = kuri::all();
        return view('dashboard.posts.prodi.kuri', compact('kuris'));
    }

    public function hapus(kuri $kuri)
    {
        try {
            $kuri->delete();
            return redirect(route('kuri'));
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus data'], 500);
        }


    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'id_kurikulum' => 'required|string|max:16|unique:kurikulum',
            'nama_kurikulum' => 'required|string|max:45'
        ])->validate();

        $kuri = kuri::create($validatedData);

        return Redirect::to('dashboard/kuri')->with('success', 'Mata kuliah berhasil ditambahkan');
    }
}
