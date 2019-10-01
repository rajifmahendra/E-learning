<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use App\data_pengajar;
use App\master_kelas;
use App\master_data;
use App\master_mapel;
use DB;

class FormguruController extends Controller
{
    public function index()
    {
        $data_pengajar = data_pengajar::where('master_data_id', auth()->user()->id)->get();
        return view('formguru.datapengajar',compact('data_pengajar'));
    }

    public function show($id)
    {
        $data_kelas = master_kelas::all();
        $data_pengajar = data_pengajar::where('master_kelas_id',$id)->get();
        $data_murid = master_data::where('master_kelas_id',$id)->orderby('nama')->paginate(5);
        return view('formguru.showmurid',compact('data_kelas','data_pengajar','data_murid'));
    }

    public function nilaimurid_kelas()
    {
        $data_mapel = master_mapel::all();
        return view('formguru.nilaimurid_kelas',compact('data_mapel'));
    }

    public function nilaimurid_kelas_tampil($id)
    {
      $data_mapel = master_mapel::all();
      $wali_murid = master_kelas::where('master_data_id',auth()->user()->id)->first();
      $data_guru = db::select("select b.id, b.nama as mapel, a.master_kelas_id, c.nama as guru
              FROM data_pengajar a,
                   master_mapel b,
                   master_data c

             where a.master_mapel_id = b.id
             and a.master_data_id = c.id
             and 	a.master_mapel_id = :idmapel
             and a.master_kelas_id = :idkelas
             ",['idmapel'=>$id ,'idkelas'=>1]);
      $data_nilai_murid = db::select("select b.id, b.noinduk, b.nama, a.kelas, c.tugas, c.uts, c.uas,
              cast(((c.tugas*40)/100)+((c.uts*30)/100)+((c.uas*30)/100)as integer) as total,
              		if(((c.tugas*40)/100)+((c.uts*30)/100)+((c.uas*30)/100) >=75,	'Lulus','Tidak Lulus')status_ujian
                  from master_kelas a,
                     master_data b
                  left join(
                       select a.id, a.nama, sum(a.tugas) tugas, sum(a.uts) uts, sum(a.uas) uas,
                          sum(a.idtugas) idtugas, sum(a.iduts) iduts, sum(a.iduas) iduas
                         from (
                          SELECT c.id, c.nama,
                              if(e.master_ujian_tipe_id = 1, cast((sum(f.nilai_benar_persoal)/10)/count(1)*100 as integer), null )tugas,
                              if(e.master_ujian_tipe_id = 2, cast((sum(f.nilai_benar_persoal)/10)/count(1)*100 as integer), null )uts,
                              if(e.master_ujian_tipe_id = 3, cast((sum(f.nilai_benar_persoal)/10)/count(1)*100 as integer), null )uas,

                              if(e.master_ujian_tipe_id = 1, sum(e.id), null )idtugas,
                              if(e.master_ujian_tipe_id = 2, sum(e.id), null )iduts,
                              if(e.master_ujian_tipe_id = 3, sum(e.id), null )iduas

                            FROM data_pengajar a,
                               master_kelas b,
                               master_data c,
                               ujian_murid d,
                               data_ujian e,
                               ujian_murid_detail f
                           where a.master_mapel_id = :id1
                             and b.master_data_id = :id2
                             and a.master_kelas_id = b.id
                             and c.master_kelas_id = b.id
                             and d.master_data_id = c.id
                             and a.id = e.data_pengajar_id
                             and e.id = d.data_ujian_id
                             and f.ujian_murid_id = d.id
                           group by c.id, c.nama, e.master_ujian_tipe_id ) a
                       group by a.id, a.nama
                    ) c on c.id = b.id
                 where a.master_data_id = :id3
                    and b.master_status_id = 1
                   and a.id = b.master_kelas_id
                 order by b.noinduk",['id1'=>$id, 'id2'=>auth()->user()->id,
                                      'id3'=>auth()->user()->id]);
        return view('formguru.tampilnilai',compact('data_mapel','wali_murid','data_guru','data_nilai_murid'));
    }
}
