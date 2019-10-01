<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\master_data;
use Hash;

class resetpasswordController extends Controller
{
      public function index()
      {
          $data_guru = master_data::find(auth()->user()->id);
        if(auth()->user()->master_jabatan_id==1 or auth()->user()->master_jabatan_id==2){
          return view('formguru.resetpasswordguru',compact('data_guru'));
        }else{
          return view('aksesmurid.resetpasswordmurid',compact('data_guru'));
        }
      }

      public function update(Request $request, $id)
      {
        $this->validate($request,[
          'old_password' => 'required',
          'password' => 'min:3|required_with:password_confirmation|same:password_confirmation',
          'password_confirmation' => 'min:3|required_with:password|same:password',
        ]);

          if(!Hash::check($request->old_password, auth()->user()->password)) {
            return redirect('home')->with('status', 'Password Lama Tidak Sesuai.');
          }else{
          $reset = master_data::find(decrypt($id));
          $reset->password = Hash::make($request->password);
          if($reset->save()){
            return redirect('home')->with('status', 'Update password, Berhasil');
          }else{
            return redirect('home')->with('status', 'Update password, Gagal');
          }
      }
    }
}
