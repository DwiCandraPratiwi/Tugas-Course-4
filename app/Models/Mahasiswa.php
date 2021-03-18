<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $timestamp = true;

    public function mata_kuliah(){ //many to many
        return $this->belongsToMany(Mata_Kuliah::class, 'mahasiswa_matkul', 'mahasiswa_id', 'mata_kuliah_id');
    }

    
}
