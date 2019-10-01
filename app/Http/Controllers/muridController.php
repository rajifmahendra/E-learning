<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use App\master_data;
use App\master_agama;
use App\master_gander;
use App\master_jabatan;
use App\master_status;
use App\master_kelas;

class muridController extends Controller
{
    public function index()
    {
        $data_murid = master_data::where('master_jabatan_id',3)->orderby('nama')->paginate(5);
        return view('datamurid.murid',compact('data_murid'));
    }

    public function print()
    {
    $data_murid = master_data::where('master_jabatan_id',3)->get();

    // $pdf = PDF::loadview('dataguru.guru_pdf',compact('data_guru'));
    // return $pdf->download('dataguru-pdf');
    return view('datamurid.murid_print',compact('data_murid'));
    }

    public function search(Request $request)
    {
      $search = $request->search;

      // $tampil_data = true;
      $data_murid = master_data::where('master_data.nama', 'like', "%{$search}%")
                // ->where('nama', 'like', '%'.$search.'%')
                ->orwhere('master_data.noinduk', 'like', "%{$search}%")
                // ->orwhere('noinduk','like','%'.$search.'%')
                ->where('master_jabatan_id',3)
                ->select('master_data.id','master_data.noinduk','master_data.nama',
                  'master_data.master_gander_id','master_data.master_kelas_id','master_data.master_agama_id','master_data.master_status_id')
                ->orderby('master_data.nama')
                ->paginate(5);
      return view('datamurid.murid',compact('data_murid'));
    }

    public function create()
    {
        $data_agama= master_agama::all();
        $data_gander= master_gander::all();
        $data_jabatan= master_jabatan::all();
        $data_kelas= master_kelas::all();
        return view('datamurid.tambahmurid',compact('data_agama','data_gander','data_jabatan','data_kelas'));
    }

    public function store(Request $request)
    {
      $this->validate($request,[
          'html_nama' => 'required',
          'html_nis' => 'required|numeric',
          'html_password' => 'required|min:5',
          'html_lahir' => 'required',
          'html_gander' => 'present',
          'html_ortu' => 'required|alpha',
          'html_hp' => 'required|numeric',
          'html_alamat' => 'required',
          'html_tahunmasuk' => 'required|numeric',
          'html_email' => 'required|email'
      ]);
        $cek_data_murid = master_data::where('noinduk',$request->html_noinduk)->count();
        if($cek_data_murid != 0){
          return redirect('datamurid')->with('status', 'Tambah Data gagal, Nomor Induk sudah ada');
        }else{
          $tambahmurid = new master_data;
          $tambahmurid->noinduk = $request->html_nis;
          $tambahmurid->nama = $request->html_nama;
          $tambahmurid->lahir = $request->html_lahir;
          $tambahmurid->master_gander_id =$request->html_gander;
          $tambahmurid->master_agama_id =$request->html_agama;
          $tambahmurid->nama_ortu = $request->html_ortu;
          $tambahmurid->nohandphone =$request->html_hp;
          $tambahmurid->email =$request->html_email;
          $tambahmurid->alamat =$request->html_alamat;
          $tambahmurid->tahun_masuk =$request->html_tahunmasuk;
          $tambahmurid->master_kelas_id =$request->html_kelas;
          $tambahmurid->master_status_id = 2;
          $tambahmurid->master_jabatan_id = 3;
          $tambahmurid->password = Hash::make($request->html_password);

          if($tambahmurid->save()){
            return redirect('datamurid')->with('status', 'Data Murid Berhasil di Tambah !!!');
          }else{
            return redirect('datamurid')->with('status', 'Data Murid Gagal di Tambah !!!, silahkan cek kembali data anda !!!');
          }
        }
    }

    public function show($id)
    {
        $datamurid = master_data::find($id);
        $data_murid = master_data::where('id',$id)->get();
        return view('datamurid.showmurid',compact('datamurid','data_murid'));
    }

    public function edit($id)
    {
        $data_murid = master_data::find($id);
        $data_agama = master_agama::all();
        $data_jabatan = master_jabatan::all();
        $data_status = master_status::all();
        $data_gander = master_gander::all();
        $data_kelas = master_kelas::all();
        return view('datamurid.editmurid',compact('data_murid','data_agama','data_jabatan','data_status','data_gander','data_kelas'));
    }

    public function update(Request $request, $id)
    {
      $this->validate($request,[
          'html_nama' => 'required',
          'html_lahir' => 'required',
          'html_ortu' => 'required|alpha',
          'html_hp' => 'required|numeric',
          'html_alamat' => 'required',
          'html_tahunmasuk' => 'required|numeric',
          'html_email' => 'required|email'
      ]);
        $editmurid = master_data::find($id);
        $editmurid ->nama = $request->html_nama;
        $editmurid ->lahir = $request->html_lahir;
        $editmurid ->master_gander_id =$request->html_gander;
        $editmurid ->master_agama_id =$request->html_agama;
        $editmurid ->nama_ortu = $request->html_ortu;
        $editmurid ->nohandphone =$request->html_hp;
        $editmurid ->email =$request->html_email;
        $editmurid ->alamat =$request->html_alamat;
        $editmurid ->tahun_masuk =$request->html_tahunmasuk;
        $editmurid ->master_kelas_id =$request->html_kelas;
        $editmurid ->master_status_id = $request->html_status;

        if($editmurid ->save()){
          return redirect('datamurid')->with('status', 'Data Murid Berhasil di Edit !!!');
        }else{
          return redirect('datamurid')->with('status', 'Data Murid Gagal di Edit !!!, silahkan cek kembali data anda !!!');
        }
    }

    public function resetpassword($id)
    {
        $data_murid = master_data::find($id);
        return view('datamurid.resetpassword',compact('data_murid'));
    }

    public function resetpassword_update(Request $request, $id)
    {
      $this->validate($request,[
          'html_password' => 'required|min:5'
      ]);
      $data_reset = master_data::find($id);
      $data_reset->password = hash::make($request->html_password);
              if($data_reset->save()){
                return redirect('datamurid')->with('status', 'Reset password Data Murid Berhasil!!');
              }else{
                return redirect('datamurid')->with('status', 'Reset password Data Murid Gagal, silahkan cek kembali data anda.');
              }
    }
    public function destroy($id)
    {
          if(master_data::destroy($id)){
            return redirect('datamurid')->with('status', 'Data Murid Berhasil di Hapus !!!');
          }else{
            return redirect('datamurid')->with('status', 'Data Murid Gagal di Hapus !!!, silahkan cek kembali data anda !!!');
          }
    }
}
