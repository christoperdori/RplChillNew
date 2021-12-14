<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\SuratKeluar;

class MahasiswaController extends Controller
{
    public function index(){
        $surat2 = SuratKeluar::where('jenis','Surat Keterangan')->count();
        $surat4 = SuratKeluar::where('jenis','Surat Undangan')->count();
        return view('mahasiswa.home', compact('surat2','surat4'));
    }

}