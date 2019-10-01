<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_ujian_tipe extends Model
{
    public $table='master_ujian_tipe';

    public function data_ujian(){
      return $this->hasMany('App\data_ujian');
    }
}
