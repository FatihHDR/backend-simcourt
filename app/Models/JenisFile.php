<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisFile extends Model
{

    use HasFactory;
    protected $table = 'jenis_files';
    protected $fillable = ['pembiayaan_id', 'nama_jenis_file'];

    // Relasi: JenisFile milik satu PembiayaanPerkara
    public function pembiayaanperkara()
    {
        return $this->belongsTo(PembiayaanPerkara::class, 'pembiayaan_id');
    }

    // Relasi: JenisFile memiliki banyak FilePersyaratan
    public function filepersyaratan()
    {
        return $this->hasMany(FilePersyaratan::class, 'jenisfile_id');
    }
}