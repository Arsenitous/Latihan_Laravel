<?php

use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('IndexMahasiswa');
// });


Route::get('/', [MahasiswaController::class, 'index']);
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('Main');
Route::get('/add', [MahasiswaController::class, 'create'])->name('AddMahasiswa');
Route::post('/add', [MahasiswaController::class, 'store'])->name('StoreMahasiswa');

Route::get('/mahasiswa/{id}',[MahasiswaController::class, 'show']);
Route::put('/mahasiswa/{id}',[MahasiswaController::class, 'update'])->name('UpdateMahasiswa');

Route::delete('/mahasiswa/{id}',[MahasiswaController::class, 'delete']);

route::get('/matakuliah',[MatakuliahController::class, 'index'])->name('Main2');

route::get('/add_mk',[MatakuliahController::class,'create'])->name('AddMatakuliah');
route::post('/add_mk',[MatakuliahController::class,'store'])->name('StoreMatakuliah');

route::get('/matakuliah/{id}',[MatakuliahController::class,'show']);
route::put('/matakuliah/{id}',[MatakuliahController::class,'update'])->name('UpdateMatakuliah');

route::delete('/matakuliah/{id}',[MatakuliahController::class,'delete']);

route::get('/dosen',[DosenController::class, 'index'])->name('Main3');

route::get('/add_dosen',[DosenController::class,'create'])->name('AddDosen');
route::post('/add_dosen',[DosenController::class,'store'])->name('StoreDosen');

route::get('/dosen/{id}',[DosenController::class,'show']);
route::put('/dosen/{id}',[DosenController::class,'update'])->name('UpdateDosen');

route::delete('/dosen/{id}',[DosenController::class,'delete']);