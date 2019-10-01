<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use DB;
use App\data_pengajar;
use App\data_materi;
use App\master_data;
use App\master_status;

class materiController extends Controller
{
    public function index()
    {
        if(auth()->user()->master_jabatan_id==2){
        $data_materi =db::table('data_pengajar')//admin
        ->join('data_materi', 'data_pengajar.id', '=', 'data_materi.data_pengajar_id')
        ->join('master_data', 'master_data.id', '=', 'data_pengajar.master_data_id')
        ->join('master_kelas', 'master_kelas.id', '=', 'data_pengajar.master_kelas_id')
        ->join('master_mapel', 'master_mapel.id', '=', 'data_pengajar.master_mapel_id')
        ->join('master_status', 'master_status.id', '=', 'data_materi.master_status_id')
        ->select(DB::raw('data_materi.*, master_data.nama nama_guru, master_kelas.kelas,
                        master_mapel.nama nama_pelajaran, master_status.nama status'))
        ->orderby('master_kelas.kelas','asc')
        ->paginate(5);
      }else{
        $data_materi =db::table('data_pengajar')
        ->join('data_materi', 'data_pengajar.id', '=', 'data_materi.data_pengajar_id')
        ->join('master_data', 'master_data.id', '=', 'data_pengajar.master_data_id')
        ->join('master_kelas', 'master_kelas.id', '=', 'data_pengajar.master_kelas_id')
        ->join('master_mapel', 'master_mapel.id', '=', 'data_pengajar.master_mapel_id')
        ->join('master_status', 'master_status.id', '=', 'data_materi.master_status_id')
        ->where('data_pengajar.master_status_id',1)
        ->select(DB::raw('data_materi.*, master_data.nama nama_guru, master_kelas.kelas,
                        master_mapel.nama nama_pelajaran, master_status.nama status'))
        ->where('data_pengajar.master_data_id', auth()->user()->id)
        ->orderby('master_kelas.kelas')
        ->paginate(5);
      }
        return view('materi.materi',compact('data_materi'));
    }

    public function search(Request $request)
    {
      $search = $request->search;

      if(auth()->user()->master_jabatan_id==2){
      $data_materi =db::table('data_pengajar')//admin
      ->join('data_materi', 'data_pengajar.id', '=', 'data_materi.data_pengajar_id')
      ->join('master_data', 'master_data.id', '=', 'data_pengajar.master_data_id')
      ->join('master_kelas', 'master_kelas.id', '=', 'data_pengajar.master_kelas_id')
      ->join('master_mapel', 'master_mapel.id', '=', 'data_pengajar.master_mapel_id')
      ->join('master_status', 'master_status.id', '=', 'data_materi.master_status_id')
      ->where('master_data.nama', 'like', "%{$search}%")
      ->orwhere('master_mapel.nama', 'like', "%{$search}%")
      ->select(DB::raw('data_materi.*, master_data.nama nama_guru, master_kelas.kelas,
                      master_mapel.nama nama_pelajaran, master_status.nama status'))
      ->orderby('master_kelas.kelas','asc')
      ->paginate(5);
    }else{
      $data_materi =db::table('data_pengajar')//guru
      ->join('data_materi', 'data_pengajar.id', '=', 'data_materi.data_pengajar_id')
      ->join('master_data', 'master_data.id', '=', 'data_pengajar.master_data_id')
      ->join('master_kelas', 'master_kelas.id', '=', 'data_pengajar.master_kelas_id')
      ->join('master_mapel', 'master_mapel.id', '=', 'data_pengajar.master_mapel_id')
      ->join('master_status', 'master_status.id', '=', 'data_materi.master_status_id')
      ->where('data_pengajar.master_status_id',1)
      ->where('master_data.nama', 'like', "%{$search}%")
      ->orwhere('master_mapel.nama', 'like', "%{$search}%")
      ->select(DB::raw('data_materi.*, master_data.nama nama_guru, master_kelas.kelas,
                      master_mapel.nama nama_pelajaran, master_status.nama status'))
      ->where('data_pengajar.master_data_id', auth()->user()->id)
      ->orderby('master_kelas.kelas')
      ->paginate(5);
    }
      return view('materi.materi',compact('data_materi'));
    }

    public function show($id)
    {
      $data_pengajar = data_pengajar::find($id);
      return view('materi.tambahmateri',compact('data_pengajar'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'html_judul' =>  'required',
            'filename' =>  'required|mimes: ppt, pptx, doc, docx, pdf',
            'html_catatan' =>  'required|min:3',
        ]);
            $materi = $request->file('filename');
            $sub_path = time();
            $tujuan_upload = 'materi';
            $upload = $materi->getClientOriginalName();
            $extension =$materi->getClientOriginalExtension();
            $path =$materi->getRealPath();
            $materi->move($tujuan_upload.'/'.$sub_path, $upload);

            $tambahmateri = new data_materi;
            $tambahmateri->data_pengajar_id = $request->data_pengajar;
            $tambahmateri->subject = $request->html_judul;
            $tambahmateri->ext = $extension;
            $tambahmateri->path = $sub_path;
            $tambahmateri->filename = $upload;
            $tambahmateri->catatan = $request->html_catatan;
            $tambahmateri->master_status_id = 2;

          if($tambahmateri->save()){
          return redirect('datamateri')->with('status', 'Materi Berhasil di Tambah !!!');
        }else{
          return redirect('datamateri')->with('status', 'Materi Gagal di Tambah !!!, silahkan cek kembali data anda !!!');
        }
      }

    public function edit($id)
    {
      $data_materi = data_materi::find($id);
      $data_pengajar = data_pengajar::where('master_data_id',$id)->get();
      $data_status = master_status::all();
      return view('materi.editmateri',compact('data_materi','data_pengajar','data_status'));
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'html_judul' =>  'required',
            'html_catatan' =>  'required|max:15',
            'filename' =>  'required|mimes:ppt,pptx,doc,docx,pdf'
        ]);
        $materi = $request->file('filename');
        $sub_path = time();
        $tujuan_upload = 'materi';
        $upload = $materi->getClientOriginalName();
        $extension =$materi->getClientOriginalExtension();
        $path =$materi->getRealPath();
        $materi->move($tujuan_upload.'/'.$sub_path, $upload);
        $editmateri = data_materi::find($id);
        $editmateri->subject = $request->html_judul;
        $editmateri->ext = $extension;
        $editmateri->path = $sub_path;
        $editmateri->filename = $upload;
        $editmateri->catatan = $request->html_catatan;
        $editmateri->master_status_id = $request->html_status;

        if($editmateri->save()){
          return redirect('datamateri')->with('status', 'Materi Berhasil di Edit !!!');
        }else{
          return redirect('datamateri')->with('status', 'Materi Gagal di Edit !!!, silahkan cek kembali data anda !!!');
        }
      }

    public function carigurutampil(){
        $tampil_data = false;
        $data_pengajar = data_pengajar::where('master_data_id', auth()->user()->id)-> get();
        return view('materi.caridataguru',compact('tampil_data','data_pengajar') );
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
        return view('materi.caridataguru', compact('hasil', 'tampil_data') );
    }

    public function destroy($id)
    {
          if(data_materi::destroy($id)){
            return redirect('datamateri')->with('status', 'Materi Berhasil di Hapus !!!');
          }else{
            return redirect('datamateri')->with('status', 'Materi Gagal di Hapus !!!, silahkan cek kembali data anda !!!');
          }
    }
}
