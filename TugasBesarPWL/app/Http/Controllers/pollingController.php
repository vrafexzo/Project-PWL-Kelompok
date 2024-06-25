<?php

namespace App\Http\Controllers;

use App\Models\polling;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;


class pollingController extends Controller
{
    public function getPollings()
    {
        $pollings = polling::all();
        return view('dashboard.posts.prodi.polling', compact('pollings'));
    }

    public function hapus(polling $polling)
    {

        $polling->delete();
        // return redirect(route('polling'));
        return redirect()->route('polling')->with('success', 'Polling deleted successfully');
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'id_polling' => 'required|string|max:16|unique:polling',
            'nama_polling' => 'required|string|max:45',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required'
        ])->validate();

        $polling = Polling::create($validatedData);

        return Redirect::to('dashboard/polling')->with('success', 'Mata kuliah berhasil ditambahkan');
    }
}
