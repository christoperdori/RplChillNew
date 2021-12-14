<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\SuratKeluar;

class DosenController extends Controller
{
    
    public function index() {
        $surat2 = SuratKeluar::where('jenis','Surat Keterangan')->count();
        $surat4 = SuratKeluar::where('jenis','Surat Undangan')->count();
        return view('dosen.home', compact('surat2','surat4'));
    }
}