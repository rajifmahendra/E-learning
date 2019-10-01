<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public $table = 'master_data';

    protected $fillable = [
      'nama', 'password', 'noinduk', 'lahir', 'nohandphone', 'alamat', 'nama_ortu',
      'email','tahun_masuk', 'master_kelas_id', 'master_jabatan_id', 'master_status_id',
      'master_gander_id', 'master_agama_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function master_data(){
      return $this->belongsTo('App\master_data');
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
}
