<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Mata_Kuliah;


class MahasiswaController extends Controller
{
    public function getMataKuliah(){
        return Mahasiswa::find(1)->mata_kuliah()->get();
    }

    public function attachMatkul(){ //attach mata kuliah dengan id 3, 4, 6 ke Mahasiswa dengan id 1
        return Mahasiswa::find(1)->mata_kuliah()->attach([3,4,6]);
    }

    public function attachMahasiswa(){
        return Mata_Kuliah::find(3)->Mahasiswa()->attach([1,2,3]);
    }


    //detach=menghapus 
    public function detachMatkul(){ //detach mata kuliah dengan id 3, 4, 6 ke Mahasiswa dengan id 1
        return Mahasiswa::find(1)->mata_kuliah()->detach([3,4,6]);
    }

    public function detachMahasiswa(){
        return Mata_Kuliah::find(3)->Mahasiswa()->detach([1,2,3]);
    }

    //kalau mau detach semua
    public function semuaData(){ 
        return Mata_Kuliah::find(3)->Mahasiswa()->detach(); //gausah diisi arraynya
    }

    //jika mau detach dengan banyak id di Mahasiswa
    // public function semuaId(){
    //     //get mahasiswa dengan id 1, 2, 3
    //     $mahasiswa = Mahasiswa::where('')    COBAK NANTIII
    // }



    public function sync(){ //sync digunakan agar saat di run 2 kali, tidak membuat data yang double
        return Mahasiswa::find(1)->mata_kuliah()->sync([1,2,3]);
    }


    public function form(){
        $data = Mahasiswa::get();
        return view('mahasiswa', compact('data'));
    }
}
