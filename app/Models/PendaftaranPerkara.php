<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranPerkara extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'alamat_kantor',
        'no_handphone',
        'telp_kantor',
        'no_induk',
        'organisasi',
        'tanggal_mulai_berlaku',
        'tanggal_habis_berlaku',
        'tanggal_penyumpahan',
        'tempat_penyumpahan',
        'no_ba_sumpah',
        'no_ktp',
        'bank',
        'no_rekening',
        'nama_akun_bank',
        'kelas_id',
        'mahasiswa_id',
        'pendaftaran_sidang_id',
        'file_dokumen_kta',
        'file_dokumen_penyumpahan',
        'file_dokumen_ktp',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }

    public function pendaftaranSidang()
    {
        return $this->belongsTo(PendaftaranSidang::class, 'pendaftaran_sidang_id');
    }
}