<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use App\data_materi;
use App\master_data;
use App\data_pengajar;

class materimuridController extends Controller
{
    public function index()
    {
        $data_murid = master_data::find(auth()->user()->id);
        $data_pengajar = data_pengajar::where('master_kelas_id',auth()->user()->master_kelas_id)->get();
        return view('aksesmurid.mapelmateri',compact('data_murid','data_pengajar'));
    }

    public function show($id)
    {
      $data_murid = master_data::find(auth()->user()->id);
      $data_materi = data_materi::where('data_pengajar_id',$id)->where('master_status_id',1)->get();
      return view('aksesmurid.materimurid',compact('data_murid','data_materi'));
    }
}
