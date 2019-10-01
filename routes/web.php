<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect('/login');
});

Auth::routes();
Route::group(['middleware'=>'auth'], function(){
  Route::get('/home', 'HomeController@index')->name('home');
  Route::resource('/resetpassword','resetpasswordController');
  Route::group(['middleware'=>'admin'], function(){
      // ----------Data Guru---------------//
      Route::resource('/dataguru','guruController');
      Route::get('/dataguru/{id}/resetpassword','guruController@resetpassword');
      Route::patch('/dataguru/resetpassword/{id}','guruController@resetpassword_update');
      Route::get('/searchguru','guruController@search');
      Route::get('/guru/print', 'guruController@print');
      // Route::post('/dataguru/search/tampil','guruController@tampil');
      // ----------Data Murid---------------//
      Route::resource('/datamurid','muridController');
      Route::get('/datamurid/{id}/resetpassword','muridController@resetpassword');
      Route::patch('/datamurid/resetpassword/{id}','muridController@resetpassword_update');
      Route::get('/searchmurid','muridController@search');
      Route::get('/murid/print', 'muridController@print');
      // ----------Data kelas dan Mapel---------------//
      Route::resource('/mapel','mapelController');
      Route::resource('/kelas','kelasController');
  });
  Route::group(['middleware'=>'guru_admin'], function(){
      // ----------Data topik---------------//
      Route::resource('/dataujian','topikController');
      Route::get('/searchtopik','topikController@search');
      Route::get('/cari/guru/tampil', 'topikController@carigurutampil');
      Route::post('/cari/guru', 'topikController@cariguru');
      // ----------Data soal---------------//
      Route::get('/soalujian/{id}/soal','soalController@index');
      Route::get('/soalujian/{id}/create','soalController@create');
      Route::get('/soalujian/{id}/edit','soalController@edit');
      Route::post('/soalujian','soalController@store');
      Route::post('/soalujian','soalController@update');
      Route::resource('/soalujian', 'soalController');
      Route::get('/soal/print/{id}', 'soalController@print');
  });
  Route::group(['middleware'=>'guru'], function(){
    // ----------form guru---------------//
    Route::resource('/datapengajar','FormguruController');
    Route::get('/nilaimurid_kelas','FormguruController@nilaimurid_kelas');
    Route::get('/nilaimurid_kelas/{id}','FormguruController@nilaimurid_kelas_tampil');

  });
  Route::group(['middleware'=>'murid'], function(){
    //-----------form murid-------------//
    Route::resource('/datasoal','ujianmuridController');
    Route::get('/tipeujian/{id}','ujianmuridController@pilihtipe');
    Route::get('/tampilsoal/{id}','ujianmuridController@tampilsoal');
    Route::post('/tampilsoal/{id}/selesai','ujianmuridController@kirimjawaban');
  });
  Route::group(['middleware'=>'guru_admin'], function(){
    // ----------------Form tampil nilai murid----------------
    Route::get('/tampilnilai/{id}','daftarnilaiController@index');
    Route::get('/tampiljawaban/{id}','daftarnilaiController@show');
    // --------------------untuk Materi--------------------------
    Route::resource('/datamateri','materiController');
    Route::get('/searchmateri','materiController@search');
    Route::get('/cari/dataguru/tampil', 'materiController@carigurutampil');
    Route::post('/cari/dataguru', 'materiController@cariguru');
  });
  Route::group(['middleware'=>'murid'], function(){
    // ---------------Materi murid==---------------------------
    Route::resource('/materimurid','materimuridController');
  });
  Route::group(['middleware'=>'guru_admin'], function(){
    // ---------------Laporan nilai murid==---------------------------
    Route::get('/laporannilai/cari', 'laporannilaiController@carilaporan');
    Route::post('/laporannilai/cari/tampil', 'laporannilaiController@carilaporan_tampil');
    Route::get('/laporannilai/{id}','laporannilaiController@tampil_nilai');
    Route::get('/laporanjawaban/{id}','laporannilaiController@laporan_jawaban');
    Route::get('/print/{id}','laporannilaiController@print');
  });
});
// ini untuk reset password (backdoor)
// Route::get('/set',function(){
//   $a = \DB::table('master_data')->where('id',6)->update(['password' =>  \Hash::make('123')]);
// });
