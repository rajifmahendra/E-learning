<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_ujian extends Model
{
  public $table = 'data_ujian';

  public function data_pengajar(){
    return $this->belongsTo('App\data_pengajar');
  }

  public function master_status(){
    return $this->belongsTo('App\master_status');
  }

  public function master_ujian_tipe(){
    return $this->belongsTo('App\master_ujian_tipe');
  }

  public function soal_ujian(){
    return $this->hasMany('App\soal_ujian');
  }

  public function ujian_murid(){
    return $this->hasMany('App\ujian_murid');
  }
}
