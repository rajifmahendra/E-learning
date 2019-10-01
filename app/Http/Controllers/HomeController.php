<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\master_data;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $profile = master_data::find(auth()->user()->id);
        if(auth()->user()->master_jabatan_id==1 or auth()->user()->master_jabatan_id==2){
        return view('homepage.profile', compact('profile'));
      }else{
        return view('homepage.profilemurid', compact('profile'));
      }
    }
}
