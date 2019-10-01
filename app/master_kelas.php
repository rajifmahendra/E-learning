<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_kelas extends Model
{
  public $table = 'master_kelas';

  public function master_data(){
    return $this->belongsTo('App\master_data');
  }

  public function data_pengajar(){
    return $this->hasMany('App\data_pengajar');
  }
}
