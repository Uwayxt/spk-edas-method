<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaprodiController;
use Illuminate\Support\Facades\Route;

// Survey
Route::get('/', function () {
    return view('welcome');
});




// Admin

Route::get('/login-admin',[AdminController::class,'login'])->name('admin.login');
Route::post('/login-admin/authenticate',[AdminController::class,'authenticate'])->name('admin.authenticate');
Route::get('/logout',[AdminController::class,'logout'])->name('logout');
Route::get('/permission-denied', function () {
    return view('permission-denied');
})->name('permission-denied');

Route::prefix('admin')->middleware(['auth','role:admin'])->group(function(){
    Route::get('/', function () {
        return view('index');
    })->name('admin');
    Route::get('/data', function () {
        return view('data');
    });
    Route::get('/kriteria', function () {
        return view('kriteria');
    });
    Route::get('/sub-kriteria', function () {
        return view('sub-kriteria');
    });
    Route::get('/alternatif', function () {
        return view('alternatif');
    });
    Route::get('/penilaian', function () {
        return view('penilaian');
    });
    Route::get('/hitung', function () {
        return view('hitung');
    });
    Route::get('/hasil', function () {
        return view('hasil');
    });
});


// BPM

Route::get('/login',[KaprodiController::class,'login'])->name('kaprodi.login');
Route::post('/login/authenticate',[KaprodiController::class,'authenticate'])->name('kaprodi.authenticate');

Route::prefix('kaprodi')->middleware(['auth','role:kaprodi'])->group(function(){
    Route::get('/', function () {
        return view('index');
    });
    Route::get('/data', function () {
        return view('data');
    });
    Route::get('/kriteria', function () {
        return view('kriteria');
    });
    Route::get('/sub-kriteria', function () {
        return view('sub-kriteria');
    });
    Route::get('/alternatif', function () {
        return view('alternatif');
    });
    Route::get('/penilaian', function () {
        return view('penilaian');
    });
    Route::get('/hitung', function () {
        return view('hitung');
    });
    Route::get('/hasil', function () {
        return view('hasil');
    });
});



// form

Route::get('/form', function () {
    return view('form');
});
Route::get('/form-2', function () {
    return view('form-2');
});
