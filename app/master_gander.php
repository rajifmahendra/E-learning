<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class master_gander extends Model
{
  public $table = 'master_gander';

  public function master_data(){
    return $this->hasMany('App\master_data');
  }
}
