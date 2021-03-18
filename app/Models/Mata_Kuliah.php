<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mata_Kuliah extends Model
{
    use HasFactory;
    protected $table = 'mata_kuliah';

    protected $fillable = ['nama_mata_kuliah', 'sks'];

    use SoftDeletes;

    public function jadwal(){ //relation one to many
        return $this->hasMany(Jadwal::class, 'mata_kuliah_id');  //mata kuliah pnya bnyk jdwl
    }


    public function Mahasiswa(){ //many to many
        return $this->belongsToMany(Mahasiswa::class, 'mahasiswa_matkul', 'mata_kuliah_id', 'mahasiswa_id');
    }

    public function dosen(){
        return $this->hasMany(Mata_Kuliah::class, 'dosen_matkul', 'mata_kuliah_id', 'dosen_id');
    }
}