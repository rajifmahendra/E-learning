<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_materi extends Model
{
      public $table='data_materi';

      public function data_pengajar(){
        return $this->belongsTo('App\data_pengajar');
      }

      public function master_status(){
        return $this->belongsTo('App\master_status');
      }
}
