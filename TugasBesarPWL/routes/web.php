<?php

use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\matakuliahController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\kuriController;
use App\Http\Controllers\pollingController;
use App\Http\Controllers\sksController;
use App\Http\Middleware\adminMiddle;
use App\Http\Middleware\prodiMiddle;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('login', [
        "title" => "Home"
    ]);
});

Route::get('/home', function () {
    return view('home', [
        "title" => "Home"
    ]);
})->name('home');

Route::get('unauthorized', function () {
    return view('unauthorized');
})->name('unauthorized');


Route::get('/blog', [PostController::class, 'index']);
//Halaman Single Post
Route::get('posts/{slug}', [PostController::class, 'show']);

Route::get('/dashboard/salah', function () {
    return view('dashboard');
})->name('salah');

Route::get('/', [AuthManager::class, 'login'])->name('login');
Route::get('/login', [AuthManager::class, 'login'])->name('login1');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

// login2
Route::get('/login2', [AuthManager::class, 'login'])->name('login12');
Route::post('/login2', [AuthManager::class, 'loginPost'])->name('login.post2');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/test', function () {
        return "Diketahui user masuk";
    });
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard'); //->middleware('auth');

    Route::resource('/dashboard/index', DashboardPostController::class);
    Route::resource('/dashboard/posts', DashboardPostController::class);

    Route::get('/dashboard/pemilihansks', [sksController::class, 'getSks'])->name('list-sks');
    Route::post('/dashboard/pemilihansks', [sksController::class, 'store'])->name('sks-insert');
});

// Admin
Route::middleware(['adminMiddle'::class])->group(function () {
    Route::get('/test', function () {
        return "BERHASIL";
    });
    Route::get('/dashboard/role', [RoleController::class, 'showRoles'])->name('show-role');
    Route::post('/dashboard/posts', [matakuliahController::class, 'store'])->name('mk-insert');
    Route::delete('/dashboard/mk-hapus/{matakuliah}', [matakuliahController::class, 'hapus'])->name('mk-hapus');

    Route::get('/dashboard/user',  [AuthManager::class, 'getUsers'])->name('register');
    Route::post('/dashboard/user', [AuthManager::class, 'registerPost'])->name('register.post');
    Route::delete('/dashboard/user/{user}', [AuthManager::class, 'hapus'])->name('user-hapus');
});

// Prodi
Route::middleware(['prodiMiddle'::class])->group(function () {
    Route::get('/test', function () {
        return "BERHASIL";
    });
    Route::get('/dashboard/kuri',  [kuriController::class, 'getKuris'])->name('kuri');
    Route::post('/dashboard/kuri', [kuriController::class, 'store'])->name('kuri.post');
    Route::delete('/dashboard/kuri/{kuri}', [kuriController::class, 'hapus'])->name('kuri-hapus');

    Route::get('/dashboard/polling',  [pollingController::class, 'getPollings'])->name('polling');
    Route::post('/dashboard/polling',  [pollingController::class, 'store'])->name('polling.post');
    Route::delete('/dashboard/polling/{polling}',  [pollingController::class, 'hapus'])->name('polling-hapus');
});


Route::get('/create-polling', function () {
    return view('dashboard.posts.admin.create-polling');
});

Route::get('/hasil-polling', function () {
    return view('hasilpolling');
});

Route::get('/edit', function () {
    return view('edit');
});
