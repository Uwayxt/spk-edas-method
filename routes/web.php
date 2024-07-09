<?php

use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});


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


// form

Route::get('/form', function () {
    return view('form');
});
Route::get('/form-2', function () {
    return view('form-2');
});
