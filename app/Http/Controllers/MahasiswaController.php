<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function dashmhs()
    {
        return view('dashmhs');
    }
    public function arsipmhs()
    {
        return view('arsipmhs');
    }
    public function profilemhs()
    {
        return view('profilemhs');
    }
    public function smmhs()
    {
        return view('smmhs');
    }
    public function skmhs()
    {
        return view('skmhs');
    }
    public function index()
    {
    	
    	$mahasiswa = DB::table('mahasiswa')->get();
 
    
    	return view('mahasiswa',['mahasiswa' => $mahasiswa]);
    }
    public function tambah() {
        return view('buatsrtmhs');
    }
    public function buatsrtmhs(Request $request)
    {
	DB::table('mahasiswa')->insert([
        'jenis_surat' => $request->jenis_surat,
		'tujuan_surat' => $request->tujuan_surat,
		'tgl_pelaksanaan_kegiatan' => $request->tgl_pelaksanaan_kegiatan,
		'nama_mitra' => $request->nama_mitra,
		'alamat_mitra' => $request->alamat_mitra,
        'keterangan' => $request->keterangan
	]);

	return redirect('/mahasiswa');
}
public function edit($id)
{
	$mahasiswa = DB::table('mahasiswa')->where('nim_mhs',$id)->get();
	return view('editmhs',['mahasiswa' => $mahasiswa]);
 
}
public function update($id,Request $request)
{
	
	DB::table('mahasiswa')->where('nim_mhs',$request->id)->update([
        'jenis_surat' => $request->jenis_surat,
		'tujuan_surat' => $request->tujuan_surat,
		'tgl_pelaksanaan_kegiatan' => $request->tgl_pelaksanaan_kegiatan,
		'nama_mitra' => $request->nama_mitra,
		'alamat_mitra' => $request->alamat_mitra,
        'keterangan' => $request->keterangan
	]);
	return redirect('/mahasiswa');
}
public function hapus($id)
{
	
	DB::table('mahasiswa')->where('nim_mhs',$id)->delete();
	return redirect('/mahasiswa');
}
}

