<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ujian_murid extends Model
{
  public $table = 'ujian_murid';

  public function master_data(){
    return $this->belongsTo('App\master_data');
  }
  
  public function data_ujian(){
    return $this->belongsTo('App\data_ujian');
  }

  public function ujian_murid_detail(){
    return $this->hasMany('App\ujian_murid_detail');
  }
}
