<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_pengajar extends Model
{
  public $table = 'data_pengajar';

  public function master_data(){
    return $this->belongsTo('App\master_data');
  }

  public function master_kelas(){
    return $this->belongsTo('App\master_kelas');
  }

  public function master_status(){
    return $this->belongsTo('App\master_status');
  }

  public function master_mapel(){
    return $this->belongsTo('App\master_mapel');
  }

  public function data_ujian(){
    return $this->hasMany('App\data_ujian');
  }

  public function data_materi(){
    return $this->hasMany('App\data_materi');
  }
}
