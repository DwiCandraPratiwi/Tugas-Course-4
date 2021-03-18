<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $timestamp = true;


    public function matakul(){
        return $this->belongsTo(Mata_Kuliah::class, 'mata_kuliah_id');
    }

}