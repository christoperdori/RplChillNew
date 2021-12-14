<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\User;

class AdminController extends Controller
{
     
    public function index() {
        return view('admin.home');
    }

    public function valid($id) {
        $srt = SuratMasuk::find($id);
        $pejabat = User::where('role','dosen')->get();
        return view('admin.valid', compact('srt','pejabat'));
    }

    public function simpanValid($id, REQUEST $request) {
        $srt = SuratMasuk::find($id);
        $surat1 = SuratKeluar::where('jenis','Surat Tugas')->count();
        $surat2 = SuratKeluar::where('jenis','Surat Keterangan')->count();
        $surat3 = SuratKeluar::where('jenis','Surat Personalia')->count();
        $surat4 = SuratKeluar::where('jenis','Surat Undangan')->count();
        $surat5 = SuratKeluar::where('jenis','Surat Berita')->count();
        $valid = SuratMasuk::find($id);
        if ($valid->suratkeluar->jenis=='Surat Tugas') {
            $no = $surat1.'/D/FTI/'.date('Y');
        }elseif ($valid->suratkeluar->jenis=='Surat Keterangan') {
            $no = $surat2.'/B/FTI/'.date('Y');
        }elseif ($valid->suratkeluar->jenis=='Surat Personalia') {
            $no = $surat3.'/A/FTI/'.date('Y');
        }elseif ($valid->suratkeluar->jenis=='Surat Undangan') {
            $no = $surat4.'/C/FTI/'.date('Y');
        }else {
            $no = $surat5.'/E/FTI/'.date('Y');
        }
        if ($request->status=='Approved') {
            $srt->no_surat = $no;
            $srt->tanggal = date('Y-m-d');
            $srt->status = $request->status;
            $srt->id_dosen = $request->ttd;
            $srt->save();
        }else {
            $srt->status = $request->status;
            $srt->pesan = $request->pesan;
            $srt->save();
        }
        return redirect('suratMasuk');
    }

    public function upload($id, REQUEST $request) {
        $surat = SuratMasuk::find($id);
        $srt = $request->file('surat');
        $srtName = $surat->id . $srt->getClientOriginalName();
        $srt->move('surat/',$srtName);
        $surat->surat = $srtName;
        $surat->save();
        return redirect('suratKeluar');
    }
}