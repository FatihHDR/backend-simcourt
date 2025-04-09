<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function students() {
        return $this->hasMany(Mahasiswa::class);
    }

    public function dokumen()
    {
        return $this->hasMany(DokumenPermohonan::class);
    }

    public function persetujuanPihaks()
    {
        return $this->hasMany(PersetujuanPihak::class);
    }

    public function members()
    {
        return $this->belongsToMany(Instruktur::class, 'team_user', 'team_id', 'instruktur_id');
    }
}
