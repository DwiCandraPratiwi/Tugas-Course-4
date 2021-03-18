<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\MatkulController;



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
Route::get('/auth', [UsersController::class, 'register']);
Route::post('login', [UsersController::class, 'login']);
Route::get('/login', [UsersController::class, 'loginView'])->name('login');
Route::get('/home', [UsersController::class, 'home'])->name('home')->middleware('auth');
Route::get('/logout', [UsersController::class, 'logout']);










Route::get('/user', function(){ // autentikasi
    return 'Login';
})->middleware('auth');

Route::get('/daftar', function(){
    return 'Silakan login terlebih dahulu';
})->name('login');

Route::get('/admin', function(){
    return 'Selamat datang di halaman admin';
})->middleware(['auth', 'middle']);
















// [[[Routes Tugas Course 3]]]
Route::get('/create_dosen', [DosenController::class, 'createDosen']);

Route::get('/createEloquent', [DosenController::class, 'createEloquent']);

Route::get('/update', [DosenController::class, 'updateMahasiswa']);

Route::get('/mahas', [DosenController::class, 'getSemuaMahasiswa']);













//TUGAS


//Route untuk get semua data dosen
Route::get('/dataDosen', [DosenController::class, 'getDataDosen']);

//Route untuk get semua data mahasiswa
Route::get('/mahasiswa', [DosenController::class, 'getMahasiswa']);

//Route untuk get semua data mata kuliah
Route::get('/matkul', [DosenController::class, 'getMataKuliah']);

//Route untuk get semua data dosen berdasarkan id
route::get('/dosen/{id}', [DosenController::class, 'getDosenById']);

//Route untuk get data nama matkul saja
Route::get('/matkulModel', [DosenController::class, 'getMatkulModel']);

//Route untuk get 5 data mahasiswa
route::get('/mahasiswaData', [DosenController::class, 'getDataMahasiswa']);

//Route dengan limit
route::get('/mahasiswaLimit', [DosenController::class, 'getLimit']);

route::get('/limit', [DosenController::class, 'get5Data']);

//AKHIR










Route::get('/', function () {
    return ('string');
});

Route::get('/barang/{id}/detail/{detail}', function($id, $detail){
    return 'Barang dengan id '.$id.' dengan detail '.$detail;
});


Route::prefix('/test')->group(function(){ //prefix dengan group
    Route::get('/users', function(){
        return 'user';
    });
});


Route::get('/test', function(){
    return 'test';
});


//HelloController
Route::get('/barang', [HelloController::class, 'getBarang']);
Route::get('/barang/{id}', [HelloController::class, 'getBarangById']);
Route::get('/bunga/{id}', [HelloController::class, 'getBunga']);
Route::get('/view', [HelloController::class, 'returnView']);
Route::get('/view/{id}', [HelloController::class, 'returnView']);


// DosenController
Route::get('/dosen', [DosenController::class, 'getDosen']);

Route::get('/model', [DosenController::class, 'getDosenModel']);







//Route pertemuan 3
//route beberapa data 
Route::get('/create', [DosenController::class, 'getUser']);

//route create / insert data dengan variabel
Route::get('/creates', [DosenController::class, 'getusers']);

//route create / insert data dengan OOP
Route::get('/creates3', [DosenController::class, 'getuser3']);

//update data
Route::get('/creates4', [DosenController::class, 'getuser4']);

//update data dengan ORM Eloquent
Route::get('/creates5', [DosenController::class, 'updateorm']);

//delete
Route::get('/delete', [DosenController::class, 'delete2']);

//soft delete
Route::get('/deleted', [DosenController::class, 'softDelete']);

//relation
Route::get('/relation', [DosenController::class, 'matkulWithJadwal']);




Route::get('/relation1', [DosenController::class, 'matkuljadwal']);




//pertemuan 4
Route::get('/matkul', [MahasiswaController::class, 'getMataKuliah']);

Route::get('/attach', [MahasiswaController::class, 'attachMatkul']);

Route::get('/attachMahasiswa', [MahasiswaController::class, 'attachMahasiswa']);

Route::get('/detach', [MahasiswaController::class, 'detachMatkul']);

Route::get('/sync', [MahasiswaController::class, 'sync']);

Route::get('/form', [MahasiswaController::class, 'form']);

Route::resource('/rec', PhotoController::class);


//Tugas Course 4

Route::resource('/matakuliah', MatkulController::class);






