<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DosenController extends Controller
{
    
    public function dashdosen()
    {
        return view('dashdosen');
    }
    public function arsipdosen()
    {
        return view('arsipdosen');
    }
    public function profiledosen()
    {
        return view('profiledosen');
    }
    public function smdosen()
    {
        return view('smdosen');
    }
    public function skdosen()
    {
        return view('skdosen');
    }
    public function index()
    {
    	
    	$dosen = DB::table('dosen')->get();
 
    	
    	return view('dosen',['dosen' => $dosen]);
    }
    public function tambah() {
        return view('buatsrtdosen');
    }
    public function buatsrtdosen(Request $request)
    {

	DB::table('dosen')->insert([
		'jenis_surat' => $request->jenis_surat,
		'tgl_pelaksanaan_kegiatan' => $request->tgl_pelaksanaan_kegiatan,
        'lokasi_kegiatan' => $request->lokasi_kegiatan,
		'nama_mitra' => $request->nama_mitra,
        'keterangan' => $request->keterangan
	]);
	
	return redirect('/dosen');
}
public function edit($id)
{
	$dosen = DB::table('dosen')->where('nik_dosen',$id)->get();
	return view('editdosen',['dosen' => $dosen]);
 
}
public function update($id,Request $request)
{
	
	DB::table('dosen')->where('nik_dosen',$request->id)->update([
        'jenis_surat' => $request->jenis_surat,
		'tgl_pelaksanaan_kegiatan' => $request->tgl_pelaksanaan_kegiatan,
        'lokasi_kegiatan' => $request->lokasi_kegiatan,
		'nama_mitra' => $request->nama_mitra,
        'keterangan' => $request->keterangan
	]);
	return redirect('/dosen');
}
public function hapus($id)
{
	
	DB::table('dosen')->where('nik_dosen',$id)->delete();
	return redirect('/dosen');
}
}
