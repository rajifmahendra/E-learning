<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use DB;
use App\ujian_murid;
use App\ujian_murid_detail;
use App\data_pengajar;
use App\master_data;

class laporannilaiController extends Controller
{
  public function carilaporan(){
      $tampil_data = false;
      $data_pengajar = data_pengajar::where('master_data_id', auth()->user()->id)-> get();
      return view('laporannilai.carilaporan' , compact('tampil_data','data_pengajar') );
  }

  public function carilaporan_tampil(Request $request){
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
      return view('laporannilai.carilaporan', compact('hasil', 'tampil_data') );
  }

  public function tampil_nilai($id)
  {
    $data_pengajar = data_pengajar::find($id);
    $nilai_murid = db::select("select a.id, a.nama, b.master_data_id, c.tugas, c.uts, c.uas, c.idtugas, c.iduts, c.iduas,
                 cast(((c.tugas*40)/100)+((c.uts*30)/100)+((c.uas*30)/100)as integer) as total,
                 		if(((c.tugas*40)/100)+((c.uts*30)/100)+((c.uas*30)/100) >=75,	'Lulus','Tidak Lulus')status_ujian
                FROM data_pengajar b,
                     master_data a left join
                     (
              		select a.id, a.nama, sum(a.tugas) tugas, sum(a.uts) uts, sum(a.uas) uas,
              				sum(a.idtugas) idtugas, sum(a.iduts) iduts, sum(a.iduas) iduas
              		  from (
              				SELECT c.id, c.nama,
              						if(e.master_ujian_tipe_id = 1, cast((sum(f.nilai_benar_persoal)/10)/count(1)*100 as integer), null )tugas,
              						if(e.master_ujian_tipe_id = 2, cast((sum(f.nilai_benar_persoal)/10)/count(1)*100 as integer), null )uts,
              						if(e.master_ujian_tipe_id = 3, cast((sum(f.nilai_benar_persoal)/10)/count(1)*100 as integer), null )uas,

                          if(e.master_ujian_tipe_id = 1, (d.id), null )idtugas,
                      		if(e.master_ujian_tipe_id = 2, (d.id), null )iduts,
                      		if(e.master_ujian_tipe_id = 3, (d.id), null )iduas

              				  FROM data_pengajar a,
              					   master_kelas b,
              					   master_data c,
              					   ujian_murid d,
              					   data_ujian e,
              					   ujian_murid_detail f
              				 where a.id = :id1
              				   and a.master_kelas_id = b.id
              				   and c.master_kelas_id = b.id
              				   and d.master_data_id = c.id
              				   and a.id = e.data_pengajar_id
              				   and e.id = d.data_ujian_id
              				   and f.ujian_murid_id = d.id
              				 group by c.id, c.nama, e.master_ujian_tipe_id ,
                            if(e.master_ujian_tipe_id = 1, (d.id), null ),
                            if(e.master_ujian_tipe_id = 2, (d.id), null ),
                            if(e.master_ujian_tipe_id = 3, (d.id), null )) a
              		 group by a.id, a.nama
                     ) c on a.id = c.id
               where b.id = :id2
                 and a.master_kelas_id = b.master_kelas_id", ['id1'=>$id, 'id2'=>$id]);
    return view('laporannilai.hasilnilai',compact('data_pengajar','nilai_murid'));
  }

  public function laporan_jawaban($id)
  {
    // @dd('oke');
      $ujian_murid = ujian_murid::find($id);
      $ujian_murid_detail = ujian_murid_detail::where('ujian_murid_id',$id)->get();
      $data_siswa_ujian  = db::select("select a.id, a.master_data_id,
        cast((sum(b.nilai_benar_persoal)/10)/count(1)*100 as integer) nilai,
       if(((sum(b.nilai_benar_persoal)/10)/count(1))*100 >=80,
                  'Lulus','Tidak Lulus')status_lulus
                          from ujian_murid a,
                             ujian_murid_detail b

                          where a.id = b.ujian_murid_id
                          and   a.id = :idujian_murid

                        group by a.id, a.master_data_id",['idujian_murid'=>$id]);
      return view('laporannilai.laporanjawaban',compact('ujian_murid','ujian_murid_detail','data_siswa_ujian'));
  }

  public function print($id)
  {
    $data_pengajar = data_pengajar::find($id);
    $nilai_murid = db::select("select a.id, a.nama, b.master_data_id, c.tugas, c.uts, c.uas, c.idtugas, c.iduts, c.iduas,
                 cast(((c.tugas*40)/100)+((c.uts*30)/100)+((c.uas*30)/100)as integer) as total,
                    if(((c.tugas*40)/100)+((c.uts*30)/100)+((c.uas*30)/100) >=75,	'Lulus','Tidak Lulus')status_ujian
                FROM data_pengajar b,
                     master_data a left join
                     (
                  select a.id, a.nama, sum(a.tugas) tugas, sum(a.uts) uts, sum(a.uas) uas,
                      sum(a.idtugas) idtugas, sum(a.iduts) iduts, sum(a.iduas) iduas
                    from (
                      SELECT c.id, c.nama,
                          if(e.master_ujian_tipe_id = 1, cast((sum(f.nilai_benar_persoal)/10)/count(1)*100 as integer), null )tugas,
                          if(e.master_ujian_tipe_id = 2, cast((sum(f.nilai_benar_persoal)/10)/count(1)*100 as integer), null )uts,
                          if(e.master_ujian_tipe_id = 3, cast((sum(f.nilai_benar_persoal)/10)/count(1)*100 as integer), null )uas,

                          if(e.master_ujian_tipe_id = 1, (d.id), null )idtugas,
                          if(e.master_ujian_tipe_id = 2, (d.id), null )iduts,
                          if(e.master_ujian_tipe_id = 3, (d.id), null )iduas

                        FROM data_pengajar a,
                           master_kelas b,
                           master_data c,
                           ujian_murid d,
                           data_ujian e,
                           ujian_murid_detail f
                       where a.id = :id1
                         and a.master_kelas_id = b.id
                         and c.master_kelas_id = b.id
                         and d.master_data_id = c.id
                         and a.id = e.data_pengajar_id
                         and e.id = d.data_ujian_id
                         and f.ujian_murid_id = d.id
                       group by c.id, c.nama, e.master_ujian_tipe_id ,
                            if(e.master_ujian_tipe_id = 1, (d.id), null ),
                            if(e.master_ujian_tipe_id = 2, (d.id), null ),
                            if(e.master_ujian_tipe_id = 3, (d.id), null )) a
                   group by a.id, a.nama
                     ) c on a.id = c.id
               where b.id = :id2
                 and a.master_kelas_id = b.master_kelas_id", ['id1'=>$id, 'id2'=>$id]);
    return view('laporannilai.print',compact('data_pengajar','nilai_murid'));
  }
}
