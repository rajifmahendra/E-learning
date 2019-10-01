<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_agama extends Model
{
  public $table = 'master_agama';

  public function master_data(){
    return $this->hasMany('App\master_data');
  }
}
