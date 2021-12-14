<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;
    protected $table = "suratmasuk";
    protected $fillable = ['no_surat','status','tanggal','surat','pesan','id_surat','id_dosen'];

    public function dosen() {
        return $this->belongsTo(User::class, 'id_dosen');
    }

    public function suratkeluar() {
        return $this->belongsTo(SuratKeluar::class, 'id_surat');
    }
}
