<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function getBarang(){
        return 'Ini dari controller barang';
    }

    public function getBarangById($id){
        return 'Ini barang dengan id '.$id;
    }

    public function getBunga($id){
        return 'Ini adalah nama Bunga dengan id '. $id; 
    }

    public function returnView($id){
        $namaDepan = 'Dwi Candra';
        $namaBlkng = 'Pratiwi';
        return view('greetings', compact('namaDepan', 'namaBlkng', 'id'));
    }


}
