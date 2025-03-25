<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranPermohonan extends Model
{
    use HasFactory;

    protected $fillable = [
        'persidangan_id',
        'group_id',
        'class_id',
    ];

    public function dokumen()
    {
        return $this->hasMany(DokumenPermohonan::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function class()
    {
        return $this->belongsTo(Kelas::class, 'class_id');
    }

    public function toArray()
    {
        return [
            'data' => [
                'persidangan_id' => $this->persidangan_id,
                'nama_kelompok' => $this->group->name ?? null,
                'kelas' => $this->class->name ?? null,
                'dokumen' => $this->dokumen->map(function ($dokumen) {
                    return [
                        'nama_dokumen' => $dokumen->nama_dokumen,
                        'diupload_oleh' => $dokumen->diupload_oleh,
                        'peran' => $dokumen->peran,
                        'file_path' => $dokumen->file_path,
                        'status' => $dokumen->status ?? 'Belum terverifikasi',
                        'created_at' => $dokumen->created_at,
                        'keterangan' => $dokumen->keterangan,
                        'updated_at' => $dokumen->updated_at,
                    ];
                }),
            ],
        ];
    }
}