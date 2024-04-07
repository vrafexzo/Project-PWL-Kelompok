<?php

namespace App\Http\Controllers;

use App\models\matakuliah;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardPostController extends Controller
{

    public function index()
    {
        // return Post::where('user_id', auth()->user()->id)->get();
        return view('dashboard.posts.index', ['matakuliahs' => matakuliah::all()]);
    }

    public function sidebar()
    {
        return view('dashboard.index');
    }
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Post $post)
    {
        //
    }

    public function edit(Post $post)
    {
        //
    }

    public function destroy()
    {
        //
    }
}
