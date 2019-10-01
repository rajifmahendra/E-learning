<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use DB;
use App\soal_ujian;
use App\data_ujian;

class soalController extends Controller
{
    public function index($id)
    {
        $data_soal = soal_ujian::where('data_ujian_id',$id)->orderby('id')->paginate(5);
        $data_ujian = data_ujian::find($id);
        return view('dataujian.soalujian',compact('data_soal','data_ujian'));
    }
    public function print($id)
    {
      $data_soal = soal_ujian::where('data_ujian_id',$id)->orderby('id')->paginate(5);
      $data_ujian = data_ujian::find($id);
      return view('dataujian.printsoal',compact('data_soal','data_ujian'));
    }
    public function create($id)
    {
        $data_soal = soal_ujian::where('data_ujian_id',$id)->orderby('id')->paginate(5);
        $data_ujian = data_ujian::find($id);
        return view('dataujian.tambahsoal',compact('data_soal','data_ujian'));
    }

    public function store(Request $request)
    {
      $this->validate($request,[
          'html_pertanyaan' => 'required',
          'html_a' => 'required',
          'html_b' => 'required',
          'html_c' => 'required',
          'html_d' => 'required',
          'html_e' => 'required',
          'html_jawaban' => 'in:A,B,C,D,E',
      ]);
          $tambahsoal= new soal_ujian;
          $tambahsoal->pertanyaan = $request->html_pertanyaan;
          $tambahsoal->pilihan_a = $request->html_a;
          $tambahsoal->pilihan_b = $request->html_b;
          $tambahsoal->pilihan_c = $request->html_c;
          $tambahsoal->pilihan_d = $request->html_d;
          $tambahsoal->pilihan_e = $request->html_e;
          $tambahsoal->jawaban = $request->html_jawaban;
          $tambahsoal->data_ujian_id = $request->topik;
          $tambahsoal->master_status_id = 1;

          if($tambahsoal->save()){
            return redirect('soalujian/'.$request->topik.'/create')->with('status', 'Soal Berhasil di Tambah !!!');
          }else{
            return redirect('soalujian/'.$request->topik.'/create')->with('status', 'Soal Gagal di Tambah !!!, silahkan cek kembali data anda !!!');
          }
        }

     public function edit($id)
     {
         $data_soal = soal_ujian::find($id);
         $data_ujian = data_ujian::all();
         return view('dataujian.editsoal',compact('data_soal','data_ujian'));
     }

     public function update(Request $request, $id)
     {
       $this->validate($request,[
           'html_pertanyaan' => 'required',
           'html_a' => 'required',
           'html_b' => 'required',
           'html_c' => 'required',
           'html_d' => 'required',
           'html_e' => 'required',
           'html_jawaban' => 'in:A,B,C,D,E',
       ]);
          $editdatasoal = soal_ujian::find($id);
          $editdatasoal ->pertanyaan = $request->html_pertanyaan;
          $editdatasoal ->pilihan_a = $request->html_a;
          $editdatasoal ->pilihan_b = $request->html_b;
          $editdatasoal ->pilihan_c = $request->html_c;
          $editdatasoal ->pilihan_d = $request->html_d;
          $editdatasoal ->pilihan_e = $request->html_e;
          $editdatasoal ->jawaban = $request->html_jawaban;


          if($editdatasoal ->save()){
           return redirect('soalujian/'.$request->topik.'/soal')->with('status', 'Soal Berhasil di Edit !!!');
         }else{
            return redirect('soalujian/'.$request->topik.'/soal')->with('status', 'Soal Gagal di Edit !!!, silahkan cek kembali data anda !!!');
          }
     }

    public function destroy($id)
    {
          if(soal_ujian::destroy($id)){
            return redirect('/dataujian')->with('status', 'Soal  Berhasil di Hapus !!!');
          }else{
            return redirect('/dataujian')->with('status', 'Soal Topik Gagal di Hapus !!!, silahkan cek kembali data anda !!!');
          }
    }
}
