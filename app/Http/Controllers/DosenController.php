<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Mata_Kuliah;
use App\Models\Jadwal;
use App\Models\Mahasiswa;
use DB;

class DosenController extends Controller
{

    // [[[TUGAS Course 3:]]] 

    //create data dosen baru
    public function createDosen(){
        $create = DB::table('dosen')->insert([
            'nama' => 'Candra Pratiwi',
            'alamat' => 'Sibang Gede',
            'nik' => 272935
        ]);
    }

    //create dengan eloquent
    public function createEloquent(){
        $create = Dosen::create([
            'nama' => 'Sintya Septya',
            'alamat' => 'Abiansemal',
            'nik' => 200345
        ]);
    }

    //update data mahasiswa yang sudah ada
    public function updateMahasiswa(){ 
        $flight = Mahasiswa::find(1);
        $flight -> nama = 'Dwican';
        $flight -> save();
        return $flight;
    }

    //get semua mahasiswa dari dosen dengan id tertentu
    public function getSemuaMahasiswa(){
        $mahasiswa = Dosen::find(1)->mahasiswa()->get();
        return $mahasiswa;
    }








    public function getDosen(){
        $data = DB::table('dosen')->where('nama', 'LIKE', '%Sintya%')->get();
        return [$data];
    }

    public function getDosenModel(){
        $data = Dosen::where('nama', 'LIKE', '%Sintya%')->get();
        return [$data];
    }




    //TUGASS --HANYA MENGGUNAKAN DosenController.php dan route(web.php)


    //get semua data dosen
    public function getDataDosen(){
        $data = DB::table('dosen')->get();
        return $data;
    }

    //get semua data mahasiswa
    public function getMahasiswa(){
        $data = DB::table('mahasiswa')->get();
        return $data;
    }

    //get semua data mata kuliah
    public function getMataKuliah(){
        $data = DB::table('mata_kuliah')->get();
        return $data;
    }

    //get semua data dosen berdasarkan id
    public function getDosenById($id){
        $data = DB::table('dosen')->where('id', $id)->get();
        return [($data)];
    }

    //get semua data nama mata kuliah saja //perbaikan
    public function getMatkulModel(){
        $data = Mata_Kuliah::select('nama_mata_kuliah')->get();
        return [$data];
    }

    //get 5 data mahasiswa //perbaikan
    public function getDataMahasiswa(){
        $data = Dosen::select('*')->limit(5)->get();
        return $data;
    }

    //gunakan limittt
    public function getLimit(){
        $data = Dosen::select('*')->limit(5)->get();
        return $data;
    }

    public function get5Data(){
        $mahasiswa = Dosen::select('*')
        -> offset(4) //diskip 4
        -> limit(1) //menampilkan 1 
        -> get();

        //atau

        // $mahasiswa = Dosen::select('*')
        // ->skip(4)
        // ->take(7)
        // ->get();
        return $mahasiswa;
    }



    //Pertemuan 3
    public function getUser(){ //CREATE/INSERT
        $data = DB::table('mata_kuliah')->insert([
        [
            'nama_mata_kuliah' => 'Teknik Informatika',
            'sks' => 44
        ],
        [
            'nama_mata_kuliah' => 'Informasi', 
            'sks' => 6
        ]
        ]);
        return $data;
    }

    //materi create cttn: create itu 1, insert bisa lebih dari 1
    //CREATE dengan variabel
    public function getUsers(){
        $insert = ['nama_mata_kuliah' => 'Teknologi', 'sks' => 45];
        $data = DB::table('mata_kuliah')->insert([$insert]);
        return $data;
    }

    //create dengan OOP
    public function getUser2(){
        $mataKuliah = new Mata_Kuliah;
        $mataKuliah->nama_mata_kuliah='Teknik Informatika';
        $mataKuliah->sks='20';
        $mataKuliah->save();
        return $mataKuliah;
    }

    public function getuser3(){
        $data = Mata_Kuliah::create([
            'nama_mata_kuliah'=>'Teknik',
            'sks'=> 22
        ]);
        return $data;
    }

    //UPDATE
    public function getUser4(){ //CREATE/INSERT
        $data = DB::table('mata_kuliah')->where('id', 1)->update([
            'nama_mata_kuliah' => 'Teknik Informatika',
            'sks' => 44
        ]);
        return $data;
    }

    //update dengan ORM Eloquent
    public function updateOrm(){ //CREATE/INSERT
        // $flight = Mata_Kuliah::find(1);
        // $flight -> sks = 21;
        // $flight -> save();

        //atau

        $flight = Mata_Kuliah::where('id', 1) //update banyak data, bs pke yg ini
        ->update([
            'sks'=> 20
        ]);
        return $flight;
    }



    //DELETE
    public function delete(){ //delete table
        $delete = DB::table('mata_kuliah')->delete();
        return $delete;
    }


    public function delete2(){ //delete data dengan where 'dibawah 3'
        $delete = DB::table('mata_kuliah')->where('id', '<', 3)->delete();
        return $delete;
    }


    //SOFT DELETE: untuk mendelete data namun masih teteap ada di database
    public function softDelete(){
        $delete = DB::table('mata_kuliah')->where('id', 5)->delete();
        return $delete;
    }


    //relation
    public function matkulWithJadwal(){
        $matkul = Mata_Kuliah::find(4)->jadwal()->get();
        return $matkul;
    }

    //data dgn relation mencari berdasarkan hari
    public function matkulWithJadwal2(){
        $matkul = Mata_Kuliah::find(4)->jadwal()->where('hari', 'senin')->get();
        return $matkul;
    }

    //
    public function matkuljadwal(){
        $jadwal = Jadwal::find(4)->matakul()->get();
        return $jadwal;
    }
}
