<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PanggilanSidang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor',
        'tanggal_sidang',
        'jam_sidang',
        'detail_pendaftaran_id',
        'catatan_panggilan',
        'kategori',
        'tanggal_panggilan',
        'pihak_id'
    ];

    public function detailPendaftaran()
    {
        return $this->belongsTo(DetailPendaftaran::class, 'detail_pendaftaran_id');
    }

    public function pihak()
    {
        return $this->belongsTo(Pihak::class, 'pihak_id');
    }
}