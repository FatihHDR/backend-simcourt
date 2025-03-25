<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPermohonan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_dokumen',
        'diupload_oleh',
        'peran',
        'file_path',
        'status',
        'keterangan',
    ];

    const NAMA_DOKUMEN_ENUM = [
        'Surat Gugatan',
        'Perbaikan Gugatan',
        'Penetapan Hakim/Majelis Hakim',
        'Penunjukkan Panitera Pengganti',
        'Penunjukkan Jurusita/JSP',
    ];

    const STATUS_ENUM = [
        'Belum terverifikasi',
        'Terverifikasi',
    ];

    protected $attributes = [
        'created_at' => null, // Default value for created_at
    ];
}