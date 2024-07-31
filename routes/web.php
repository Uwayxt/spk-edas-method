<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Survey
Route::get('/', function () {
    return view('welcome');
});

Route::get('/biodata', [StudentController::class,'indexBiodata'])->name('biodata.index');

Route::get('/kriteria', [StudentController::class,'create'])->name('student.create');
Route::post('/kriteria', [StudentController::class,'store'])->name('student.store');

// Admin
Route::get('/login-admin',[AdminController::class,'login'])->name('admin.login');
Route::post('/login-admin/authenticate',[AdminController::class,'authenticate'])->name('admin.authenticate');
Route::get('/logout',[AdminController::class,'logout'])->name('logout');
Route::get('/permission-denied', function () {
    return view('permission-denied');
})->name('permission-denied');

Route::prefix('admin')->middleware(['role:admin'])->group(function(){
    // Dashboard
    Route::get('/', [AdminController::class,'index'])->name('admin.index');

    // Kriteria
    Route::get('/kriteria', [CriteriaController::class,'index'])->name('criteria.index');
    Route::get('/kriteria/tambah', [CriteriaController::class,'create'])->name('criteria.create');
    Route::post('/kriteria/simpan', [CriteriaController::class,'store'])->name('criteria.store');
    Route::get('/kriteria/{id}/', [CriteriaController::class,'show'])->name('criteria.show');
    Route::get('/kriteria/{id}/edit', [CriteriaController::class,'edit'])->name('criteria.edit');
    Route::put('/kriteria/{id}/', [CriteriaController::class,'update'])->name('criteria.update');

    Route::get('/kriteria/tambah-subjek', [CriteriaController::class,'createSubject'])->name('criteria.subject.create');
    Route::post('/kriteria/simpan-subjek', [CriteriaController::class,'storeSubject'])->name('criteria.subject.store');

    // Siswa
    Route::get('/siswa', [StudentController::class,'index'])->name('admin.student.index');
    Route::get('/siswa/tambah', [StudentController::class,'create'])->name('admin.student.create');
    Route::post('/siswa/simpan', [StudentController::class,'store'])->name('admin.student.store');
    Route::get('/siswa/{id}/', [StudentController::class,'show'])->name('admin.student.show');
    Route::get('/siswa/{id}/edit', [StudentController::class,'edit'])->name('admin.student.edit');
    Route::put('/siswa/{id}/', [StudentController::class,'update'])->name('criteria.update');

    // Jurusan
    Route::get('/jurusan', [MajorController::class,'index'])->name('major.index');
    Route::get('/jurusan/tambah', [MajorController::class,'create'])->name('major.create');
    Route::post('/jurusan/simpan', [MajorController::class,'store'])->name('major.store');
    Route::get('/jurusan/{id}/', [MajorController::class,'show'])->name('major.show');
    Route::get('/jurusan/{id}/edit', [MajorController::class,'edit'])->name('major.edit');
    Route::put('/siswa/{id}/', [MajorController::class,'update'])->name('major.update');


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

Route::prefix('kaprodi')->middleware(['role:kaprodi'])->group(function(){
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::get('/data-survey', function () {
        return view('data-survey');
    });
});
