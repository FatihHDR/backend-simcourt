<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranSidang extends Model
{
    /** @use HasFactory<\Database\Factories\PendaftaranSidangFactory> */
    use HasFactory;


    protected $table = 'pendaftaran_sidangs';
    protected $fillable = ['mahasiswa_id', 'nama_pengadilan', 'pembiayaan_id'];

    // Relasi: PendaftaranSidang milik satu PembiayaanPerkara
    public function pembiayaanperkara()
    {
        return $this->belongsTo(PembiayaanPerkara::class, 'pembiayaan_id');
    }

    // Relasi: PendaftaranSidang memiliki banyak FilePersyaratan
    public function filepersyaratan()
    {
        return $this->hasMany(FilePersyaratan::class, 'pendaftaran_sidang_id');
    }
    public function Advokat()
    {
        return $this->hasMany(Advokat::class, 'pendaftaran_sidang_id');
    }
    public function Pihak()
    {
        return $this->hasMany(Pihak::class, 'pendaftaran_sidang_id');
    }
    public function DetailPendaftaran()
    {
        return $this->hasMany(DetailPendaftaran::class, 'pendaftaran_sidang_id');
    }
    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}