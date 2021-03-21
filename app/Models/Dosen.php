<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Dosen extends Model
{
    use HasFactory;
    protected $table = 'Dosen';

    protected $fillable = ['nama', 'alamat', 'nik'];

    public function id()
    {
        return $this->belongsTo('App\Id');
    }

    public function mahasiswa(){ //relation one to many
        return $this->hasMany(Mahasiswa::class, 'dosen_id');  //mata kuliah pnya bnyk jdwl
    }

    public function mata_kuliah(){
        return $this->belongsToMany(Mata_Kuliah::class, 'dosen_matkul', 'dosen_id', 'mata_kuliah_id');
    }

}


