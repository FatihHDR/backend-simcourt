<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
class FilePersyaratan extends Model
{
    use HasFactory;

    protected $table = 'file_persyaratans';
    protected $fillable = ['pendaftaran_sidang_id', 'jenisfile_id', 'nama_file', 'status'];

    // Relasi: FilePersyaratan milik satu PendaftaranSidang
    public function pendaftaransidang()
    {
        return $this->belongsTo(PendaftaranSidang::class, 'pendaftaran_sidang_id');
    }

    // Relasi: FilePersyaratan milik satu JenisFile
    public function jenisfile()
    {
        return $this->belongsTo(JenisFile::class, 'jenisfile_id');
    }
}
