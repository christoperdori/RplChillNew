<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SuratKeluar;
use Auth;
use DB;
use App\Models\SuratMasuk;

class SuratController extends Controller
{
    public function index() {
        $user = User::all();
        return view('surat', compact('user'));
    }

    public function suratKeluar() {
        if (Auth::user()->role=='admin') {
            $surat = SuratMasuk::all();
        }else {
            $surat = DB::table('suratmasuk')->join('suratkeluar','id_surat','=','suratkeluar.id')->select(DB::raw('suratkeluar.jenis as jenis, suratkeluar.perihal as perihal, suratmasuk.status, suratkeluar.id as id, suratmasuk.pesan as pesan'))->where('suratkeluar.id_user',Auth::id())->get();
        }
        return view('suratkeluar', compact('surat'));
    }

    public function suratMasuk() {
        if (Auth::user()->role=='admin') {
            $surat = SuratMasuk::all();
        }else {
            $surat = DB::table('suratmasuk')->join('suratkeluar','id_surat','=','suratkeluar.id')->select(DB::raw('suratmasuk.no_surat as no_surat, suratmasuk.surat as surat, suratkeluar.jenis as jenis, suratkeluar.perihal as perihal, suratmasuk.status as status, suratkeluar.id as id'))->where('suratkeluar.id_user',Auth::id())->get();
        }
        return view('suratmasuk', compact('surat'));
    }

    public function arsip() {
        if (Auth::user()->role=='admin') {
            $surat = SuratMasuk::where('status','Approved')->get();
        }else {
            $surat = DB::table('suratmasuk')->join('suratkeluar','id_surat','=','suratkeluar.id')->select(DB::raw('suratmasuk.no_surat as no_surat, suratmasuk.surat as surat, suratkeluar.jenis as jenis, suratkeluar.perihal as perihal, suratmasuk.tanggal as tanggal, suratkeluar.id as id'))->where('suratkeluar.id_user',Auth::id())->where('suratmasuk.status','Approved')->get();
        }
        return view('arsip', compact('surat'));
    }

    public function simpan(REQUEST $request) {
        if ($request->jenis==1) {
            SuratKeluar::create([
                'perihal' => $request->perihal,
                'kepada' => $request->kepada,
                'keterangan' => $request->keterangan,
                'jenis' => 'Surat Personalia',
                'id_user' => $request->user
            ]);
        }elseif ($request->jenis==2) {
            SuratKeluar::create([
                'perihal' => $request->perihal,
                'kepada' => $request->kepada,
                'keterangan' => $request->keterangan,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'lokasi' => $request->lokasi,
                'jenis' => 'Surat Keterangan',
                'id_user' => $request->user
            ]);
        }elseif ($request->jenis==3) {
            SuratKeluar::create([
                'perihal' => $request->perihal,
                'kepada' => $request->kepada,
                'keterangan' => $request->keterangan,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'lokasi' => $request->lokasi,
                'jenis' => 'Surat Undangan',
                'id_user' => $request->user
            ]);
        }elseif ($request->jenis==4) {
            SuratKeluar::create([
                'perihal' => $request->perihal,
                'kepada' => $request->kepada,
                'userid' => $request->userid,
                'nama' => $request->nama,
                'tanggal' => $request->tanggal,
                'penyelenggara' => $request->penyelenggara,
                'lokasi' => $request->lokasi,
                'jenis' => 'Surat Tugas',
                'id_user' => $request->user
            ]);
        }else {
            SuratKeluar::create([
                'perihal' => $request->perihal,
                'pembicara' => $request->pembicara,
                'tanggal' => $request->tanggal,
                'waktu' => $request->waktu,
                'lokasi' => $request->lokasi,
                'jenis' => 'Surat Berita',
                'id_user' => $request->user
            ]);
        }
        $surat = DB::table('suratkeluar')->orderBy('id','desc')->limit('1')->get();
        foreach ($surat as $srt) {
            $id_srt = $srt->id;
        }
        SuratMasuk::create([
            'status' => 'Pending',
            'id_surat' => $id_srt
        ]);
        return redirect('suratKeluar');
    }

    public function unduh($id) {
        $unduh = SuratMasuk::find($id);
        if ($unduh->suratkeluar->jenis=='Surat Keterangan') {
            return view('unduh.suratKeterangand', compact('unduh'));
        }elseif ($unduh->suratkeluar->jenis=='Surat Tugas') {
            return view('unduh.suratTugasd', compact('unduh'));
        }elseif ($unduh->suratkeluar->jenis=='Surat Personalia') {
            return view('unduh.suratPersonaliad', compact('unduh'));
        }elseif ($unduh->suratkeluar->jenis=='Surat Berita') {
            return view('unduh.suratBeritad', compact('unduh'));
        }else {
            return view('unduh.suratUndangand', compact('unduh'));
        }
    }

    public function hapus($id) {
        $surat = SuratKeluar::find($id);
        $surat->remove();
        return redirect('suratKeluar');
    }

    public function ubah($id) {
        $srt = SuratKeluar::find($id);
        return view('editSurat', compact('srt'));
    }

    public function update($id, REQUEST $request) {
        $surat = SuratKeluar::find($id);
        $srt = SuratMasuk::find($id);
        if ($surat->jenis=='Surat Keterangan') {
            $surat->perihal = $request->perihal;
            $surat->kepada = $request->kepada;
            $surat->keterangan = $request->keterangan;
            $surat->tanggal = $request->tanggal;
            $surat->waktu = $request->waktu;
            $surat->lokasi = $request->lokasi;
            $surat->save();
            $srt->status = "Pending";
            $srt->save();
        }else {
            $surat->perihal = $request->perihal;
            $surat->penyelenggara = $request->penyelenggara;
            $surat->userid = $request->userid;
            $surat->nama = $request->nama;
            $surat->tanggal = $request->tanggal;
            $surat->lokasi = $surat->lokasi;
            $surat->save();
            $srt->status = "Pending";
            $srt->save();
        }
        return redirect('suratKeluar');
    }
}
