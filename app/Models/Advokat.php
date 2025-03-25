<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advokat extends Model
{
    /** @use HasFactory<\Database\Factories\AdvokatFactory> */
    use HasFactory;

    protected $table = 'advokats';

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
        'file_dokumen_kta',
        'file_dokumen_penyumpahan',
        'file_dokumen_ktp',
        'kelas_id',
        'mahasiswa_id',
        'pendaftaran_sidang_id'
    ];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    public function mahasiswa(){
        return $this->belongsTo(Mahasiswa::class);
    }
    public function PendaftaranSidang(){
        return $this->belongsTo(PendaftaranSidang::class);
    }
}
