<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_mapel extends Model
{
  protected $table = 'master_mapel';
  public function master_status(){
    return $this->belongsTo('App\master_status');
  }
  public function data_pengajar(){
    return $this->hasMany('App\data_pengajar');
  }
}
