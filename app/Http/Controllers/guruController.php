<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use DB;
use PDF;
use App\master_data;
use App\master_agama;
use App\master_gander;
use App\master_jabatan;
use App\master_status;
use App\master_kelas;
use App\master_mapel;
use App\data_pengajar;

class guruController extends Controller
{
    public function index()
    {
        // $tampil_data = false;
        $data_guru = master_data::where('master_jabatan_id',1)->orderby('nama')->paginate(5);
        // return view('dataguru.dataguru',compact('data_guru','tampil_data'));
        return view('dataguru.dataguru',compact('data_guru'));
    }

    public function print()
    {
    $data_guru = master_data::where('master_jabatan_id',1)->get();

    // $pdf = PDF::loadview('dataguru.guru_pdf',compact('data_guru'));
    // return $pdf->download('dataguru-pdf');
    return view('dataguru.guru_print',compact('data_guru'));
    }

    public function search(Request $request)
    {
      $search = $request->search;

      // $tampil_data = true;
      $data_guru = master_data::where('master_data.nama', 'like', "%{$search}%")
                // ->where('nama', 'like', '%'.$search.'%')
                ->orwhere('master_data.noinduk', 'like', "%{$search}%")
                // ->orwhere('noinduk','like','%'.$search.'%')
                ->where('master_jabatan_id',1)
                ->select('master_data.id','master_data.noinduk','master_data.nama',
                  'master_data.master_gander_id','master_data.master_agama_id','master_data.master_status_id')
                ->orderby('master_data.nama')
                ->paginate(5);
      return view('dataguru.dataguru',compact('data_guru'));
    }

    public function create()
    {
      $data_agama= master_agama::all();
      $data_gander= master_gander::all();
      $data_kelas= master_kelas::all();
      $data_mapel= master_mapel::where('master_status_id',1)->get();
      return view('dataguru.tambahguru',compact('data_agama','data_gander',
                  'data_kelas','data_mapel'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $this->validate($request,[
            'html_nip' => 'required|numeric',
            'html_nama' => 'required',
            'html_lahir' => 'required',
            'html_gander' => 'present',
            'chk' => 'present',
            'html_password' => 'required|min:5',
            'html_hp' => 'required|numeric',
            'html_alamat' => 'required',
            'html_email' => 'required|email'
        ]);
        $cek_data_guru = master_data::where('noinduk',$request->html_nip)->count();
        if($cek_data_guru != 0){
          return redirect('dataguru')->with('status', 'Tambah Data gagal, NIP sudah ada');
        }else{
          $tambahguru = new master_data;
          $tambahguru->noinduk = $request->html_nip;
          $tambahguru->nama = $request->html_nama;
          $tambahguru->lahir = $request->html_lahir;
          $tambahguru->master_gander_id =$request->html_gander;
          $tambahguru->master_agama_id =$request->html_agama;
          $tambahguru->nohandphone =$request->html_hp;
          $tambahguru->email =$request->html_email;
          $tambahguru->alamat =$request->html_alamat;
          $tambahguru->master_status_id = 2;
          $tambahguru->master_jabatan_id =1;
          $tambahguru->password = Hash::make($request->html_password);

          if($tambahguru->save()){
            $id_guru = $tambahguru->id;
            $berhasil = 0;
            foreach($request->chk as $value){
              $tambahpengajar = new data_pengajar;
              $tambahpengajar->master_data_id = $id_guru;
              $tambahpengajar->master_kelas_id = $value;
              $tambahpengajar->master_mapel_id  = $request->html_mapel;
              $tambahpengajar->master_status_id = 1;
              if($tambahpengajar->save()){
                $berhasil++;
              }
            }

            if($berhasil>=1){
              DB::commit();
              return redirect('dataguru')->with('status', 'Data Guru Berhasil di Tambah !!!');
            }else{
              DB::rollback();
              return redirect('dataguru')->with('status', 'Data Guru Gagal di Tambah !!!, silahkan cek kembali data anda !!!');
            }
          }else{
            return redirect('dataguru')->with('status', 'Data Guru Gagal di Tambah !!!, silahkan cek kembali data anda !!!');
          }
        }
    }

    public function show($id)
    {
        $dataguru = master_data::find($id);
        $data_guru = master_data::where('id',$id)->get();
        $data_pengajar = data_pengajar::where('master_data_id', $id)->get();
        return view('dataguru.showguru',compact('dataguru','data_guru','data_pengajar'));
    }

    public function edit($id)
    {
        $data_guru = master_data::find($id);
        $data_agama = master_agama::all();
        $data_jabatan = master_jabatan::all();
        $data_status = master_status::all();
        $data_gander = master_gander::all();
        $data_pengajar = data_pengajar::where('master_data_id', $id)->get();
        $data_kelas = master_kelas::all();
        $data_mapel = master_mapel::where('master_status_id',1)->get();
        return view('dataguru.editguru',compact('data_guru','data_agama','data_jabatan','data_status',
                    'data_gander','data_pengajar','data_kelas','data_mapel'));
    }

    public function update(Request $request, $id)
    {
      DB::beginTransaction();
      $this->validate($request,[
          'html_nama' => 'required',
          'html_lahir' => 'required',
          'html_hp' => 'required|numeric',
          'html_alamat' => 'required',
          'html_email' => 'required|email',
          'chk' => 'present'
      ]);
        $editguru = master_data::where('master_jabatan_id',1)->where('id',$id)->first();
        $editguru ->nama = $request->html_nama;
        $editguru ->lahir = $request->html_lahir;
        $editguru ->master_gander_id =$request->html_gander;
        $editguru ->master_agama_id =$request->html_agama;
        $editguru ->nohandphone =$request->html_hp;
        $editguru ->email =$request->html_email;
        $editguru ->alamat =$request->html_alamat;
        $editguru ->master_status_id = $request->html_status;

        if($editguru->save()){
          $berhasil = 0;
          data_pengajar::where('master_data_id',$id)->delete();
          foreach($request->chk as $value){
            $editpengajar = new data_pengajar;
            $editpengajar->master_data_id = $id;
            $editpengajar->master_kelas_id = $value;
            $editpengajar->master_mapel_id  = $request->html_mapel;
            $editpengajar->master_status_id = 1;
            if($editpengajar ->save()){
              $berhasil++;
            }
          }

          if($berhasil>=1){
            DB::commit();
            return redirect('dataguru')->with('status', 'Data Guru Berhasil di edit !!!');
          }else{
            DB::rollback();
            return redirect('dataguru')->with('status', 'Data Guru Gagal di edit !!!, silahkan cek kembali data anda !!!');
          }
        }else{
          return redirect('dataguru')->with('status', 'Data Guru Gagal di edit !!!, silahkan cek kembali data anda !!!');
        }
      }

    public function resetpassword($id)
    {
        $data_guru = master_data::find($id);
        return view('dataguru.resetpassword',compact('data_guru'));
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
            return redirect('dataguru')->with('status', 'Data Guru Berhasil di Hapus !!!');
          }else{
            return redirect('dataguru')->with('status', 'Data Guru Gagal di Hapus !!!, silahkan cek kembali data anda !!!');
          }
    }
}
