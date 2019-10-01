<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class soal_ujian extends Model
{
  public $table = 'soal_ujian';

  public function data_ujian(){
    return $this->belongsTo('App\data_ujian');
  }

  public function master_status(){
    return $this->belongsTo('App\master_status');
  }

  public function ujian_murid_detail(){
    return $this->hasMany('App\ujian_murid_detail');
  }
}
