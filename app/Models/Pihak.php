<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pihak extends Model
{
    /** @use HasFactory<\Database\Factories\PihakFactory> */
    use HasFactory;

    protected $table = 'pihaks';

    protected $fillable = [
        'no_pendaftaran',
        'status_pihak',
        'email',
        'nama_lengkap',
        'status_alamat',
        'alamat',
        'telepon',
        'provinsi',
        'kecamatan',
        'kabupaten',
        'kelurahan',
        'pendaftaran_sidang_id'

    ];
    public function PendaftaranSidang()
    {
        return $this->belongsTo(PendaftaranSidang::class);
    }
}
