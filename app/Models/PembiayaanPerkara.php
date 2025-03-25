<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class PembiayaanPerkara extends Model
{
    use HasFactory;

    protected $table = 'pembiayaan_perkaras';
    protected $fillable = ['jenis_pembiayaan'];

    // Relasi: PembiayaanPerkara memiliki banyak PendaftaranSidang
    public function pendaftaransidang()
    {
        return $this->hasMany(PendaftaranSidang::class, 'pembiayaan_id');
    }

    // Relasi: PembiayaanPerkara memiliki banyak JenisFile
    public function jenisfile()
    {
        return $this->hasMany(JenisFile::class, 'pembiayaan_id');
    }
}