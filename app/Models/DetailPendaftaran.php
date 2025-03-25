<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPendaftaran extends Model
{
    /** @use HasFactory<\Database\Factories\DetailPendaftaranFactory> */
    use HasFactory;

    protected $fillable = [
        'no_pendaftaran',
        'pendaftaran_sidang_id',
        'kelas_id'
    ];

    public function pendaftaranSidang()
    {
        return $this->belongsTo(PendaftaranSidang::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function penggugat()
    {
        return $this->belongsTo(Mahasiswa::class, 'penggugat_id'); // Add this line
    }

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class, 'dokumen_id'); // Add this line
    }
}