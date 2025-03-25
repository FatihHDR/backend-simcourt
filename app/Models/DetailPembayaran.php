<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPembayaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'detail_pendaftaran_id',
        'diterima_dari',
        'panjar_perkara',
        'status_pembayaran',
        'tanggal_pembayaran',
        'jam_pembayaran',
    ];

    protected $casts = [
        'tanggal_pembayaran' => 'date', // Cast to Carbon instance
        'jam_pembayaran' => 'datetime:H:i:s', // Cast to time format
    ];

    public function advokat()
    {
        return $this->belongsTo(Advokat::class);
    }

    public function total(): BelongsTo
    {
        return $this->belongsTo(Pembayaran::class);
    }

    public function toArray()
    {
        $advokat = $this->advokat;
        $totalPanjarPerkara = $this->total()->sum('pemasukan');

        return [
            'id' => $this->id,
            'nama_lengkap' => $advokat->nama_lengkap ?? null,
            'nomor_rekening_advokat' => $advokat->no_rekening ?? null,
            'nama_akun_bank' => $advokat->nama_akun_bank ?? null,
            'bank' => $advokat->bank ?? null,
            'panjar_perkara' => $totalPanjarPerkara,
            'status_pembayaran' => $this->status_pembayaran ?? 'sudah dibayar',
            'tanggal_pembayaran' => $this->tanggal_pembayaran 
                ? $this->tanggal_pembayaran->translatedFormat('l, d F Y') 
                : now()->translatedFormat('l, d F Y'),
            'jam_pembayaran' => $this->jam_pembayaran ?? now()->format('H:i:s'),
        ];
    }
}