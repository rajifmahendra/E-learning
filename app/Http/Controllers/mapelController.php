<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use App\master_mapel;
use App\master_status;

class mapelController extends Controller
{
    public function index()
    {
        $data_mapel = master_mapel::orderby('nama')->paginate(5);
        return view('mapel.mapel',compact('data_mapel'));
    }

    public function create()
    {
        $data_mapel = master_mapel::all();
        $data_status = master_status::all();
        return view('mapel.tambahmapel',compact('data_mapel','data_status'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'html_kodemapel' => 'required|alpha_num',
            'html_nama' => 'required'
        ]);
        $cek_data_mapel = master_mapel::where('kodemapel',$request->html_kodemapel)->count();
        if($cek_data_mapel != 0){
          return redirect('mapel')->with('status', 'Tambah Data gagal, Kode Mata Pelajaran sudah ada');
        }else{
          $tambahmapel = new master_mapel;
          $tambahmapel->kodemapel = $request->html_kodemapel;
          $tambahmapel->nama = $request->html_nama;
          $tambahmapel->master_status_id = 2;

          if($tambahmapel->save()){
            return redirect('mapel')->with('status', 'Mata Pelajaran Berhasil di Tambah !!!');
          }else{
            return redirect('mapel')->with('status', 'Mata Pelajaran Gagal di Tambah !!!, silahkan cek kembali data anda !!!');
          }
        }
    }

    public function edit($id)
    {
        $data_mapel = master_mapel::find($id);
        $data_status = master_status::all();
        return view('mapel.editmapel',compact('data_mapel','data_status'));
    }

    public function update(Request $request, $id)
    {
      $this->validate($request,[
          'html_nama' => 'required'
      ]);
        $editmapel = master_mapel::find($id);
        $editmapel->nama = $request->html_nama;
        $editmapel->master_status_id = $request->html_status;

        if($editmapel->save()){
          return redirect('mapel')->with('status', 'Mata Pelajaran Berhasil di Edit !!!');
        }else{
          return redirect('mapel')->with('status', 'Mata Pelajaran Gagal di Edit !!!, silahkan cek kembali data anda !!!');
        }
    }

    public function destroy($id)
    {
          if(master_mapel::destroy($id)){
            return redirect('mapel')->with('status', 'Mata Pelajaran Berhasil di Hapus !!!');
          }else{
            return redirect('mapel')->with('status', 'Data Pelajaran Gagal di Hapus !!!, silahkan cek kembali data anda !!!');
          }
    }
}
