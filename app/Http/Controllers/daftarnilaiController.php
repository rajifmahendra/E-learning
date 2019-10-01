<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use DB;
use App\data_ujian;
use App\ujian_murid;
use App\ujian_murid_detail;

class daftarnilaiController extends Controller
{
    public function index($id)
    {
        $data_siswa_ujian = db::select("select d.nama, e.id, cast( e.nilai as integer) nilai, e.status_lulus, e.idnya
                from data_ujian a,
              	   data_pengajar b,
              	   master_kelas c,
              	   master_data d
              	   left join(
                        	select d.id, d.nama, (sum(f.nilai_benar_persoal)/10)/count(1)*100 nilai,
                        			   if(((sum(f.nilai_benar_persoal)/10)/count(1))*100 >=80,
                        										'Lulus','Tidak Lulus')status_lulus, e.id idnya
                        		from data_ujian a,
                        			   data_pengajar b,
                        			   master_kelas c,
                        			   master_data d,
                        			   ujian_murid e,
                        			   ujian_murid_detail f
                        		 where a.id = :idnya1
                        		   and a.data_pengajar_id = b.id
                        		   and b.master_kelas_id = c.id
                        		   and c.id = d.master_kelas_id
                        		   and e.master_data_id = d.id
                        		   and e.id = f.ujian_murid_id
                        		   and e.data_ujian_id = a.id
                        		 group by d.id, d.nama, e.id
              		) e on e.id = d.id
               where a.id = :idnya2
                 and a.data_pengajar_id = b.id
                 and b.master_kelas_id = c.id
                 and d.master_kelas_id = c.id
                 and d.master_jabatan_id = 3
               order by d.nama",['idnya1'=>$id, 'idnya2'=>$id]);
        $data_ujian = data_ujian::find($id);
        return view('nilaimurid.tampilnilai',compact('data_ujian','data_siswa_ujian'));
    }

    public function show($id)
    {
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
        return view('nilaimurid.tampiljawaban',compact('ujian_murid','ujian_murid_detail','data_siswa_ujian'));
    }

}
