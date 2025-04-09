<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

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
    
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
    
    protected static function booted()
    {
        static::addGlobalScope('team', function (Builder $builder) {
            if (auth()->check() && auth()->user()->guard_name !== 'instruktur') {
                $builder->whereNotNull('team_id'); // Only exclude records with null team_id
            }
        });
    }
}