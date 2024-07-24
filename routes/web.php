<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Survey
Route::get('/', function () {
    return view('welcome');
});

Route::get('/biodata', function () {
    return view('form-biodata');
});

Route::get('/kriteria', [StudentController::class,'indexStudent'])->name('student.index');
Route::post('/kriteria', [StudentController::class,'create'])->name('student.create');

// Admin
Route::get('/login-admin',[AdminController::class,'login'])->name('admin.login');
Route::post('/login-admin/authenticate',[AdminController::class,'authenticate'])->name('admin.authenticate');
Route::get('/logout',[AdminController::class,'logout'])->name('logout');
Route::get('/permission-denied', function () {
    return view('permission-denied');
})->name('permission-denied');

Route::prefix('admin')->middleware(['auth','role:admin'])->group(function(){
    Route::get('/', [AdminController::class,'index'])->name('admin.index');
    Route::get('/kriteria', [CriteriaController::class,'index'])->name('criteria.index');
    Route::get('/data-siswa', [StudentController::class,'index'])->name('admin.student.index');
    // Route::get('/sub-kriteria', function () {
    //     return view('sub-kriteria');
    // });
    // Route::get('/alternatif', function () {
    //     return view('alternatif');
    // });
    // Route::get('/penilaian', function () {
    //     return view('penilaian');
    // });
    // Route::get('/hitung', function () {
    //     return view('hitung');
    // });
    // Route::get('/hasil', function () {
    //     return view('hasil');
    // });
});


// BPM
Route::get('/login',[KaprodiController::class,'login'])->name('kaprodi.login');
Route::post('/login/authenticate',[KaprodiController::class,'authenticate'])->name('kaprodi.authenticate');

Route::prefix('kaprodi')->middleware(['auth','role:kaprodi'])->group(function(){
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::get('/data-survey', function () {
        return view('data-survey');
    });
});
