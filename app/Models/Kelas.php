<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $fillable = [
        'name',
        'instructor_id',
        'schedule',
        'code'
    ];

    public function instructor()
    {
        return $this->belongsTo(Instruktur::class);
    }

    public function students()
    {
        return $this->belongsToMany(Mahasiswa::class);
    }

    public function mahasiswa()
    {
        return $this->hasMany(Mahasiswa::class, 'kelas_id');
    }
    public function Advokat()
    {
        return $this->hasMany(Advokat::class, 'kelas_id');
    }
    public function DetailPendaftaran()
    {
        return $this->hasMany(DetailPendaftaran::class, 'kelas_id');
    }
}