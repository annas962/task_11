<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controllersantri;
use App\Http\Controllers\pegawaicontroller;
use App\Http\Controllers\anggotacontroller;

use App\Http\Controllers\pengarangcontroller;
use App\Http\Controllers\penerbitcontroller;
use App\Http\Controllers\kategoricontroller;
use App\Http\Controllers\bukucontroller;

use App\Http\Controllers\mahasantricontroller;
use App\Http\Controllers\dosencontroller;
use App\Http\Controllers\matakuliahcontroller;
use App\Http\Controllers\jurusancontroller;
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
    return view('welcome');
});

Route::get('/salam', function () {
    return "Assalamualaikum, Selamat Belajar Laravel PETIK Jombang Angkatan 3";
});

//routing parameter 
Route::get('/pegawai/{nama}/{devisi}', function ($nama,$devisi) {
    return 'nama pegawai: '.$nama.'<br/>departemen : '.$devisi;
});

//routing view kondisi
Route::get('/kabar', function () {
    return view('kondisi');
});

//routing view kondisi
Route::get('/santri', [santrController::class, 'dataSantri']);

Route::get('/Santrie', [Controllersantri::class, 'dataSantri']);

Route::get('/hello', function () {
    return view('hello', ['name' => 'Inaya']);
});


//routing view kondisi
Route::get('/nilai', function () {
    return view('nilai');
});

Route::get('/daftarnilai', function () {
    return view('daftar_nilai');
    });
   
    //routing view layotus 
 Route::get('/framework', function ()
 { return view('layouts.index');
 });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/pegawai', [pegawaicontroller::class, 'index'])->name('pegawai.index');
Route::get('/pegawai/create', [pegawaicontroller::class, 'create'])->name('pegawai.create'); 
Route::post('/pegawai', [pegawaicontroller::class, 'store'])->name('pegawai.store');



Route::get(
    '/anggota',
    [anggotacontroller::class, 'index']
    );
   

Route::get('/anggota', [anggotacontroller::class, 'index'])->name('anggota.index');
Route::get('/anggota/create', [anggotacontroller::class, 'create'])->name('anggota.create'); 
Route::post('/anggota', [anggotacontroller::class, 'store'])->name('anggota.store');



Route::get('/pengarang', [pengarangcontroller::class, 'index']);
Route::get('/penerbit', [penerbitcontroller::class, 'index']);
Route::get('/kategori', [kategoricontroller::class, 'index']);
Route::get('/buku', [bukucontroller::class, 'index']);
Route::get('/buku', [bukucontroller::class, 'index'])->name('buku.index');
Route::get('/buku/create', [bukucontroller::class, 'create'])->name('buku.create'); 
Route::post('/buku', [bukucontroller::class, 'store'])->name('buku.store');

Route::resource('pengarang', PengarangController::class); 
Route::resource('penerbit', PenerbitController::class); 
Route::resource('kategori', KategoriController::class); 
Route::resource('buku', BukuController::class);




Route::resource('mahasantri', mahasantricontroller::class); 
Route::resource('dosen', dosencontroller::class); 
Route::resource('matakuliah', matakuliahcontroller::class); 
Route::resource('jurusan', jurusancontroller::class);


Route::get('bukupdf',[bukucontroller::class, 'bukupdf']);


Route::get('/mahasantri', [mahasantricontroller::class, 'index'])->name('mahasantri.index');
Route::get('/mahasantri/create', [mahasantricontroller::class, 'create'])->name('mahasantri.create'); 
Route::post('/mahasantri', [mahasantricontroller::class, 'store'])->name('mahasantri.store');
