<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home',[
        "title" => "Home"
    ]);
})->name('home');

Route::get('/about', function () {
    return view('about',[
        "title" => "About",
        "name" => "Vico Rafelino",
        "image" => "fotoprofil.jpg"
    ]);
});

Route::get('/blog', function () {
    $blog_posts = [
        [
            "tittle" => "Judul Post Pertama",
            "author" => "Vico Rafelino",
            "body" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
        ],
        [
            "tittle" => "Judul Post Kedua",
            "author" => "Vico Rafelino",
            "body" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
        ]
        ];
    return view('posts',[
        "title" => "Posts",
        "posts" => $blog_posts
    ]);
});

Route::get('/role', [RoleController::class, 'showRoles']);

Route::get('/', [AuthManager::class, 'login'])->name('login');
Route::get('/login', [AuthManager::class, 'login'])->name('login1');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');
Route::get('/register',  [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/profile', function() {
        return "ini halaman profile. Tidak bisas dilihat oleh user yang belum login hanya bisa oleh user yang login!";
    });
});
