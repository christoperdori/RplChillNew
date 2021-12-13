<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

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
        $role = Auth::user()->role;
        if($role == "mahasiswa"){
            return redirect('dashmhs');
        } else if($role == "dosen"){
            return redirect('dashdosen');
        } else if($role == "admin"){
            return redirect('dashadmin');
        }  
        else {
            return redirect()->to('logout');
        }
    }
    
}
