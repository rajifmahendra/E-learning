<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Hash;
use DB;
use App\data_ujian;
use App\master_data;
use App\data_pengajar;
use App\soal_ujian;
use App\ujian_murid;
use App\ujian_murid_detail;

class ujianmuridController extends Controller
{
    public function index()
    {
        $data_murid = master_data::find(auth()->user()->id);
        $data_pengajar = data_pengajar::where('master_kelas_id',auth()->user()->master_kelas_id)->get();
        return view('aksesmurid.tugas',compact('data_murid','data_pengajar'));
    }

    public function show($id)
    {
      $data_murid = master_data::find(auth()->user()->id);
      $data_ujian = data_ujian::find($id);
      return view('aksesmurid.datatugas',compact('data_murid','data_ujian'));
    }

    public function pilihtipe($id)
    {
        $data_murid = master_data::find(auth()->user()->id);
        $data_pengajar = data_pengajar::find($id);
        $data_ujian = data_ujian::where('data_pengajar_id',$id)->where('master_status_id',1)->get();
        $hasil_nilai_murid = db::select("
                      select b.id, c.tipe, b.keterangan, b.waktu, b.semester, d.nilai, d.status_lulus
                      		from data_pengajar a,
                      			 master_ujian_tipe c,
                      			 data_ujian b
                      		left join(
                      					select  a.master_ujian_tipe_id, a.keterangan, a.waktu, a.semester,
                      							cast((sum(c.nilai_benar_persoal)/10)/count(1)*100 as integer) nilai,
                      								   if(((sum(c.nilai_benar_persoal)/10)/count(1))*100 >=80,
                      															'Lulus','Tidak Lulus')status_lulus,
                      											a.id
                      								  From  data_ujian a,
                      										ujian_murid b,
                      										ujian_murid_detail c
                      								where a.id = b.data_ujian_id
                      								and   b.id = c.ujian_murid_id
                                      and   b.master_data_id = :idmurid
                                      group by a.master_ujian_tipe_id, a.keterangan, a.waktu, a.semester, a.id
                      		)d on d.id=b.id
                      where a.id = b.data_pengajar_id
                      and   b.master_ujian_tipe_id = c.id
                      and   a.id = :idtopik
                      and   b.master_status_id = 1
                      ",['idmurid'=>auth()->user()->id, 'idtopik'=>$id]);
        return view('aksesmurid.tipeujian',compact('data_murid','data_pengajar','data_ujian','hasil_nilai_murid'));
    }

    public function tampilsoal($id)
    {
      $data_murid = master_data::find(auth()->user()->id);
      $data_ujian = data_ujian::find($id);
      // $data_soal = soal_ujian::where('data_ujian_id',$id)->get();
      $data_soal = db::table('soal_ujian')
                ->where('data_ujian_id',$id)
                ->orderby(db::raw('rand()'))
                ->limit(2)
                ->get();
      return view('aksesmurid.tampilsoal',compact('data_murid','data_ujian','data_soal'));
    }

    public function kirimjawaban(Request $request, $id)
    {
      $tot_chk=count($request->chk);
      $total_soal = data_ujian::join('soal_ujian','data_ujian.id','=','soal_ujian.data_ujian_id')
                ->where('data_ujian.id',$id)
                ->count();
          if($tot_chk != $total_soal){
            return redirect('datasoal')->with('status', 'Anda tidak menjawab semua pertanyaan, silahkan ulangi kembali');
          }
          DB::beginTransaction();
          $jawabanmurid = new ujian_murid;
          $jawabanmurid->master_data_id= auth()->user()->id;
          $jawabanmurid->data_ujian_id= $id;

          if($jawabanmurid->save()){
            $id_ujianmurid = $jawabanmurid->id;
            $berhasil = 0;
            foreach($request->soal_id as $value){
              $caridata = soal_ujian::find($value);
              $jawaban_benar=$caridata->jawaban;
              $jawaban_murid= $request->chk[$value];
              if($jawaban_benar == $jawaban_murid){
              $benar=10;
              }else{
              $benar=0;
              }
              $tambahdatadetail = new ujian_murid_detail;
              $tambahdatadetail->jawaban = $request->chk[$value];
              $tambahdatadetail->nilai_benar_persoal = $benar;
              $tambahdatadetail->ujian_murid_id = $id_ujianmurid;
              $tambahdatadetail->soal_ujian_id = $value;
              if($tambahdatadetail->save()){
                $berhasil++;
              }
            }
            if($berhasil>=1){
              DB::commit();
              return redirect('datasoal')->with('status', 'Terima Kasih Sudah Mengerjakan !!!');
            }else{
              DB::rollback();
              return redirect('datasoal')->with('status', 'Jawaban Gagal Di Kirim !!!, silahkan cek kembali jawaban anda !!!');
            }
          }else{
            return redirect('datasoal')->with('status', 'Jawaban Gagal Di Kirim !!!, silahkan cek kembali jawaban anda !!!');
          }
        }
}
