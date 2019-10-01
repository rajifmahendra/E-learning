<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_data extends Model
{
  public $table = 'master_data';

  public function User(){
    return $this->belongsTo('App\User');
  }

  public function master_agama(){
    return $this->belongsTo('App\master_agama');
  }

  public function master_gander(){
    return $this->belongsTo('App\master_gander');
  }

  public function master_status(){
    return $this->belongsTo('App\master_status');
  }

  public function master_jabatan(){
    return $this->belongsTo('App\master_jabatan');
  }

  public function master_kelas(){
    return $this->belongsTo('App\master_kelas');
  }

  public function master_mapel(){
    return $this->belongsTo('App\master_mapel');
  }

  public function data_pengajar(){
    return $this->hasMany('App\data_pengajar');
  }

  public function ujian_murid(){
    return $this->hasMany('App\ujian_murid');
  }
}
