<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_status extends Model
{
  public $table = 'master_status';

  public function master_data(){
    return $this->hasMany('App\master_data');
  }

  public function data_pengajar(){
    return $this->hasMany('App\data_pengajar');
  }

  public function data_ujian(){
    return $this->hasMany('App\data_ujian');
  }

  public function soal_ujian(){
    return $this->hasMany('App\soal_ujian');
  }
}
