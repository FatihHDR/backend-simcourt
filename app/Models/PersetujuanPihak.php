<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersetujuanPihak extends Model
{
    use HasFactory;
    protected $attributes = [
        'persetujuan' => 'belum_membuat',
    ];
    
    protected $fillable = [
        'pihak_id',
        'persetujuan',
    ];

    public function pihak()
    {
        return $this->belongsTo(Pihak::class);
    }
}