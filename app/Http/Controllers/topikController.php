<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use DB;
use App\data_ujian;
use App\master_ujian_tipe;
use App\data_pengajar;
use App\master_status;
use App\master_data;

class topikController extends Controller
{
    public function index()
    {
        if(auth()->user()->master_jabatan_id==1){ // guru
          $data_ujian_guru =db::table('data_pengajar')
          ->join('data_ujian', 'data_pengajar.id', '=', 'data_ujian.data_pengajar_id')
          ->join('master_data', 'master_data.id', '=', 'data_pengajar.master_data_id')
          ->join('master_ujian_tipe', 'master_ujian_tipe.id', '=', 'data_ujian.master_ujian_tipe_id')
          ->join('master_kelas', 'master_kelas.id', '=', 'data_pengajar.master_kelas_id')
          ->join('master_mapel', 'master_mapel.id', '=', 'data_pengajar.master_mapel_id')
          ->join('master_status', 'master_status.id', '=', 'data_ujian.master_status_id')
          ->where('data_pengajar.master_status_id',1)
          ->select(DB::raw('data_ujian.*, master_data.nama nama_guru, master_ujian_tipe.tipe, master_kelas.kelas, master_mapel.nama nama_pelajaran, master_status.nama status'))
          ->where('data_pengajar.master_data_id', auth()->user()->id)
          ->orderby('master_kelas.kelas')
          ->paginate(5);
        }else{
          $data_ujian_guru =db::table('data_pengajar')//admin
          ->join('data_ujian', 'data_pengajar.id', '=', 'data_ujian.data_pengajar_id')
          ->join('master_data', 'master_data.id', '=', 'data_pengajar.master_data_id')
          ->join('master_ujian_tipe', 'master_ujian_tipe.id', '=', 'data_ujian.master_ujian_tipe_id')
          ->join('master_kelas', 'master_kelas.id', '=', 'data_pengajar.master_kelas_id')
          ->join('master_mapel', 'master_mapel.id', '=', 'data_pengajar.master_mapel_id')
          ->join('master_status', 'master_status.id', '=', 'data_ujian.master_status_id')
          ->select(DB::raw('data_ujian.*, master_data.nama nama_guru, master_ujian_tipe.tipe, master_kelas.kelas, master_mapel.nama nama_pelajaran, master_status.nama status'))
          ->orderby('master_kelas.kelas','asc')
          ->paginate(5);
        }
        return view('dataujian.dataujian',compact('data_ujian_guru'));
    }

    public function search(Request $request)
    {
      $search = $request->search;

      if(auth()->user()->master_jabatan_id==1){ // guru
        $data_ujian_guru =db::table('data_pengajar')
        ->join('data_ujian', 'data_pengajar.id', '=', 'data_ujian.data_pengajar_id')
        ->join('master_data', 'master_data.id', '=', 'data_pengajar.master_data_id')
        ->join('master_ujian_tipe', 'master_ujian_tipe.id', '=', 'data_ujian.master_ujian_tipe_id')
        ->join('master_kelas', 'master_kelas.id', '=', 'data_pengajar.master_kelas_id')
        ->join('master_mapel', 'master_mapel.id', '=', 'data_pengajar.master_mapel_id')
        ->join('master_status', 'master_status.id', '=', 'data_ujian.master_status_id')
        ->where('data_pengajar.master_status_id',1)
        ->where('master_data.nama', 'like', "%{$search}%")
        ->orwhere('master_ujian_tipe.tipe', 'like', "%{$search}%")
        ->select(DB::raw('data_ujian.*, master_data.nama nama_guru, master_ujian_tipe.tipe, master_kelas.kelas, master_mapel.nama nama_pelajaran, master_status.nama status'))
        ->where('data_pengajar.master_data_id', auth()->user()->id)
        ->orderby('master_kelas.kelas')
        ->paginate(5);
      }else{
        $data_ujian_guru =db::table('data_pengajar')//admin
        ->join('data_ujian', 'data_pengajar.id', '=', 'data_ujian.data_pengajar_id')
        ->join('master_data', 'master_data.id', '=', 'data_pengajar.master_data_id')
        ->join('master_ujian_tipe', 'master_ujian_tipe.id', '=', 'data_ujian.master_ujian_tipe_id')
        ->join('master_kelas', 'master_kelas.id', '=', 'data_pengajar.master_kelas_id')
        ->join('master_mapel', 'master_mapel.id', '=', 'data_pengajar.master_mapel_id')
        ->join('master_status', 'master_status.id', '=', 'data_ujian.master_status_id')
        ->where('master_data.nama', 'like', "%{$search}%")
        ->orwhere('master_ujian_tipe.tipe', 'like', "%{$search}%")
        ->select(DB::raw('data_ujian.*, master_data.nama nama_guru, master_ujian_tipe.tipe, master_kelas.kelas, master_mapel.nama nama_pelajaran, master_status.nama status'))
        ->orderby('master_kelas.kelas','asc')
        ->paginate(5);
      }
      return view('dataujian.dataujian',compact('data_ujian_guru'));
    }

    public function show($id)
    {
        $data_tipe  = db::select("select * from master_ujian_tipe
                    where id not in (
                    			select a.id
                    		from master_ujian_tipe a,
                    			 data_ujian b,
                    			 data_pengajar c

                    	where a.id = b.master_ujian_tipe_id
                    	and   b.data_pengajar_id = c.id
                    	and c.id = :idguru)",['idguru'=>$id]);
        $data_pengajar = data_pengajar::find($id);
        return view('dataujian.tambahtopik',compact('data_tipe','data_pengajar'));
    }

    public function store(Request $request)
    {
      $this->validate($request,[
          'html_waktu' => 'required',
          'html_keterangan' => 'required|min:5'
      ]);
          $tambahdataujian = new data_ujian;
          $tambahdataujian->data_pengajar_id = $request->data_pengajar_id;
          $tambahdataujian->master_ujian_tipe_id = $request->html_tipe;
          $tambahdataujian->waktu = $request->html_waktu;
          $tambahdataujian->keterangan = $request->html_keterangan;
          $tambahdataujian->master_status_id = 2;
          $tambahdataujian->semester = "Genap";

          if($tambahdataujian->save()){
            return redirect('soalujian/'.$tambahdataujian->id.'/create')->with('status', 'Topik Berhasil di Tambah !!!');
          }else{
            return redirect('dataujian')->with('status', 'Topik Gagal di Tambah !!!, silahkan cek kembali data anda !!!');
          }

    }
    public function edit($id)
    {
        $data_ujian = data_ujian::find($id);
        $data_tipe = master_ujian_tipe::all();
        $data_pengajar = data_pengajar::all();
        $data_status = master_status::all();
        return view('dataujian.edittopik',compact('data_ujian','data_tipe','data_pengajar','data_status'));
    }

    public function update(Request $request, $id)
    {
      $this->validate($request,[
          'html_waktu' => 'required',
          'html_keterangan' => 'required|min:5'
      ]);
        $editdataujian = data_ujian::find($id);
        $editdataujian ->master_ujian_tipe_id = $request->html_tipe;
        $editdataujian ->waktu = $request->html_waktu;
        $editdataujian ->keterangan = $request->html_keterangan;
        $editdataujian ->master_status_id = $request->html_status;

        if($editdataujian ->save()){
          return redirect('dataujian')->with('status', 'Topik Berhasil di Edit !!!');
        }else{
          return redirect('dataujian')->with('status', 'Topik Gagal di Edit !!!, silahkan cek kembali data anda !!!');
        }
    }

    public function destroy($id)
    {
          if(data_ujian::destroy($id)){
            return redirect('dataujian')->with('status', 'Data Topik Berhasil di Hapus !!!');
          }else{
            return redirect('dataujian')->with('status', 'Data Topik Gagal di Hapus !!!, silahkan cek kembali data anda !!!');
          }
    }

    public function carigurutampil(){
        $tampil_data = false;
        $data_pengajar = data_pengajar::where('master_data_id', auth()->user()->id)-> get();
        return view('dataujian.caridata' , compact('tampil_data','data_pengajar') );
    }

    public function cariguru(Request $request){
      $cari = $request->search;

        $tampil_data = true;
         // /* SCRIPT CARI GURU/NIK */
         $hasil=master_data::join('data_pengajar','data_pengajar.master_data_id','=','master_data.id')
                  ->where(function($q)use($cari){
                $q->where('master_data.nama','like','%'.$cari.'%')
                  ->orwhere('master_data.noinduk','like','%'.$cari.'%');
         })
                ->where('master_data.master_jabatan_id',1)
                ->where('master_data.master_status_id',1)
                ->select('data_pengajar.id','master_data.noinduk','master_data.nama','data_pengajar.master_kelas_id','data_pengajar.master_mapel_id')
                ->get();
        return view('dataujian.caridata', compact('hasil', 'tampil_data') );
    }
}
