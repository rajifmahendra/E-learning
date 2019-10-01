<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use DB;
use App\master_kelas;
use App\master_data;
use App\master_status;

class kelasController extends Controller
{
    public function index()
    {
        $data_kelas = \DB::select("select a.id, a.kelas, b.nama as walikelas from master_kelas a,
        master_data b where a.master_data_id = b.id");
        return view('kelas.kelas', compact('data_kelas'));
    }

    public function create()
    {
        $data_kelas = master_kelas::all();
        $data_walikelas = db::select("select id, nama, master_jabatan_id
                          from master_data
                          where id not in
                          (
                          select a.id

                          from master_data a,
                          master_kelas b
                          where a.id = b.master_data_id
                          )and master_jabatan_id=1
                                  ");
        return view('kelas.tambahkelas',compact('data_kelas','data_walikelas'));
    }

    public function store(Request $request)
    {
      $this->validate($request,[
          'html_kelas' => 'required'
      ]);
        $cek_data_kelas= master_kelas::where('kelas',$request->html_kelas)->count();
        if($cek_data_kelas != 0){
          return redirect('kelas')->with('status', 'Tambah Data gagal, kelas sudah ada');
        }else{
          $tambahkelas = new master_kelas;
          $tambahkelas->kelas = $request->html_kelas;
          $tambahkelas->master_data_id = $request->html_walikelas;

          if($tambahkelas->save()){
            return redirect('kelas')->with('status', 'Kelas Berhasil di Tambah !!!');
          }else{
            return redirect('kelas')->with('status', 'Kelas Gagal di Tambah !!!, silahkan cek kembali data anda !!!');
          }
        }
    }

    public function edit($id)
    {
        $data_kelas = master_kelas::find($id);
        $data_walikelas = db::select("select id, nama, master_jabatan_id
                          from master_data
                          where id not in
                          (
                          select a.id

                          from master_data a,
                          master_kelas b
                          where a.id = b.master_data_id
                          and b.id != :idkelas
                          )and master_jabatan_id=1
                                  ",['idkelas'=>$id]);
        return view('kelas.editkelas',compact('data_kelas','data_walikelas'));
    }

    public function update(Request $request, $id)
    {
      $this->validate($request,[
          'html_kelas' => 'required'
      ]);
        $editkelas = master_kelas::find($id);
        $editkelas->kelas = $request->html_kelas;
        $editkelas->master_data_id = $request->html_walikelas;

        if($editkelas->save()){
          return redirect('kelas')->with('status', 'Kelas Berhasil di Edit !!!');
        }else{
          return redirect('kelas')->with('status', 'Kelas Gagal di Edit !!!, silahkan cek kembali data anda !!!');
        }
    }

    public function destroy($id)
    {
          if(master_kelas::destroy($id)){
            return redirect('kelas')->with('status', 'Kelas Berhasil di Hapus !!!');
          }else{
            return redirect('kelas')->with('status', 'Kelas Gagal di Hapus !!!, silahkan cek kembali data anda !!!');
          }
    }

    public function show($id)
    {
        $data_kelas = master_kelas::find($id);
        $data_murid = master_data::where('master_kelas_id',$id)->where('master_status_id',1)->orderby('nama')->paginate(5);
        return view('kelas.showkelas',compact('data_kelas','data_murid'));
    }
}
