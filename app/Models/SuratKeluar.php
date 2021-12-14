<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;
    protected $table = "suratkeluar";
    protected $fillable = ['perihal','kepada','keterangan','tanggal','waktu','lokasi','userid','nama','jenis','penyelenggara','id_user'];

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function suratkeluar() {
        return $this->hasOne(SuratMasuk::class, 'id_surat');
    }
}
