<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ujian_murid_detail extends Model
{
  public $table = 'ujian_murid_detail';

  public function ujian_murid(){
    return $this->belongsTo('App\ujian_murid');
  }
  public function soal_ujian(){
    return $this->belongsTo('App\soal_ujian');
  }
}
