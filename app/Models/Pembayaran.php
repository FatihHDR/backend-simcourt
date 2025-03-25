<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    public function detailPendaftaran()
    {
        return $this->belongsTo(DetailPendaftaran::class, 'detail_pendaftaran_id');
    }
}