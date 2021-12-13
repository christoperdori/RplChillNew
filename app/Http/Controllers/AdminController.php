<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
     
    public function dashadmin()
    {
        return view('dashadmin');
    }
    public function arsipadmin()
    {
        return view('arsipadmin');
    }
    public function profileadm()
    {
        return view('profileadm');
    }
    public function ksdosen()
    {
        return view('ksdosen');
    }
    public function ksmhs()
    {
        return view('ksmhs');
    }
    public function index()
    {
    	
    	$admin = DB::table('admin')->get();
 
    
    	return view('admin',['admin' => $admin]);
    }
    public function tambah() {
        return view('buatsrtadmin');
    }
    public function buatsrtadmin(Request $request)
    {
	
	DB::table('admin')->insert([
		'tujuan_surat' => $request->tujuan_surat,
		'tgl_pelaksanaan_kegiatan' => $request->tgl_pelaksanaan_kegiatan,
		'nama_mitra' => $request->nama_mitra,
		'alamat_mitra' => $request->alamat_mitra,
        'keterangan' => $request->keterangan
	]);

	return redirect('/admin');
}
public function edit($id)
{
	$admin = DB::table('admin')->where('nik_admin',$id)->get();
	return view('editadmin',['admin' => $admin]);
 
}
public function update($id,Request $request)
{
	
	DB::table('admin')->where('nik_admin',$request->id)->update([
		'tujuan_surat' => $request->tujuan_surat,
		'tgl_pelaksanaan_kegiatan' => $request->tgl_pelaksanaan_kegiatan,
		'nama_mitra' => $request->nama_mitra,
		'alamat_mitra' => $request->alamat_mitra,
        'keterangan' => $request->keterangan
	]);
	return redirect('/admin');
}
public function hapus($id)
{
	
	DB::table('admin')->where('nik_admin',$id)->delete();
	return redirect('/admin');
}
}

