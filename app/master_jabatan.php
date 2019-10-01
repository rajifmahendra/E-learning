<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_jabatan extends Model
{
  public $table = 'master_jabatan';

  public function master_data(){
    return $this->hasMany('App\master_data');
  }
}
