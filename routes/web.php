<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('admin/home',
    [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home.data1.data2.data3.data4')->middleware('is_admin');
Route::get('admin/kelas',
    [App\Http\Controllers\AdminController::class, 'kelas'])->name('admin.kelas')->middleware('is_admin');
Route::post('admin/kelas', 
    [App\Http\Controllers\AdminController::class, 'submit_kelas'])->name('admin.kelas.submit')->middleware('is_admin');
Route::get('admin/ajaxadmin/dataKelas/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDataKelas']);
Route::patch('admin/kelas', 
    [App\Http\Controllers\AdminController::class, 'update_kelas'])->name('admin.kelas.update')->middleware('is_admin');
    Route::post('admin/kelas/delete/{id}', 
    [App\Http\Controllers\AdminController::class, 'delete_kelas'])->name('admin.kelas.delete')->middleware('is_admin');

Route::get('admin/mapel',
    [App\Http\Controllers\AdminController::class, 'mapel'])->name('admin.mapel1.mapel.jurusan')->middleware('is_admin');
    Route::post('admin/mapel', 
    [App\Http\Controllers\AdminController::class, 'submit_mapel'])->name('admin.mapel.submit')->middleware('is_admin');
Route::get('admin/ajaxadmin/dataMapel/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDataMapel']);
Route::patch('admin/mapel', 
    [App\Http\Controllers\AdminController::class, 'update_mapel'])->name('admin.mapel.update')->middleware('is_admin');
    Route::post('admin/mapel/delete/{id}', 
    [App\Http\Controllers\AdminController::class, 'delete_mapel'])->name('admin.mapel.delete')->middleware('is_admin');

 Route::get('admin/waktu',
    [App\Http\Controllers\AdminController::class, 'waktu'])->name('admin.waktu')->middleware('is_admin');
Route::post('admin/waktu', 
    [App\Http\Controllers\AdminController::class, 'submit_waktu'])->name('admin.waktu.submit')->middleware('is_admin');
Route::get('admin/ajaxadmin/dataWaktu/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDataWaktu']);
Route::patch('admin/waktu', 
    [App\Http\Controllers\AdminController::class, 'update_waktu'])->name('admin.waktu.update')->middleware('is_admin');
    Route::post('admin/waktu/delete/{id}', 
    [App\Http\Controllers\AdminController::class, 'delete_waktu'])->name('admin.waktu.delete')->middleware('is_admin');

 Route::get('admin/guru',
    [App\Http\Controllers\AdminController::class, 'guru'])->name('admin.guru')->middleware('is_admin');
Route::post('admin/guru', 
    [App\Http\Controllers\AdminController::class, 'submit_guru'])->name('admin.guru.submit')->middleware('is_admin');
Route::get('admin/ajaxadmin/dataGuru/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDataGuru']);
Route::patch('admin/guru', 
    [App\Http\Controllers\AdminController::class, 'update_guru'])->name('admin.guru.update')->middleware('is_admin');
    Route::post('admin/guru/delete/{id}', 
    [App\Http\Controllers\AdminController::class, 'delete_guru'])->name('admin.guru.delete')->middleware('is_admin');


    Route::get('admin/jurusan',
    [App\Http\Controllers\AdminController::class, 'jurusan'])->name('admin.jurusan')->middleware('is_admin');
Route::post('admin/jurusan', 
    [App\Http\Controllers\AdminController::class, 'submit_jurusan'])->name('admin.jurusan.submit')->middleware('is_admin');
Route::get('admin/ajaxadmin/dataJurusan/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDataJurusan']);
Route::patch('admin/jurusan', 
    [App\Http\Controllers\AdminController::class, 'update_jurusan'])->name('admin.jurusan.update')->middleware('is_admin');
    Route::post('admin/jurusan/delete/{id}', 
    [App\Http\Controllers\AdminController::class, 'delete_jurusan'])->name('admin.jurusan.delete')->middleware('is_admin');
    
    
Route::get('admin/jadwal',
    [App\Http\Controllers\AdminController::class, 'jadwal'])->name('admin.guru.waktu.kelas.mapel.jadwal.jadwal1')->middleware('is_admin');
Route::post('admin/jadwal', 
    [App\Http\Controllers\AdminController::class, 'submit_jadwal'])->name('admin.jadwal.submit')->middleware('is_admin');
Route::get('admin/ajaxadmin/dataJadwal/{id}', 
    [App\Http\Controllers\AdminController::class, 'getDataJadwal']);
Route::patch('admin/jadwal', 
    [App\Http\Controllers\AdminController::class, 'update_jadwal'])->name('admin.jadwal.update')->middleware('is_admin');
    Route::post('admin/jadwal/delete/{id}', 
    [App\Http\Controllers\AdminController::class, 'delete_jadwal'])->name('admin.jadwal.delete')->middleware('is_admin');
Route::get('admin/print_jadwal',
    [App\Http\Controllers\AdminController::class, 'print_jadwal'])->name('admin.print.jadwal.jadwal1')->middleware('is_admin');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/jadwal', [App\Http\Controllers\HomeController::class, 'jadwal'])->name('jadwal.jadwal1');
    Route::get('/print_jadwal',
    [App\Http\Controllers\AdminController::class, 'print_jadwal'])->name('print.jadwal.jadwal1');