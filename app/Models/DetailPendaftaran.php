<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPendaftaran extends Model
{
    /** @use HasFactory<\Database\Factories\DetailPendaftaranFactory> */
    use HasFactory;

    protected $fillable = [
        'no_pendaftaran',
        'pendaftaran_sidang_id',
        'kelas_id'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'tanggal_perkara' => 'datetime', // Add this if applicable
    ];

    public function pendaftaranSidang()
    {
        return $this->belongsTo(PendaftaranSidang::class, 'pendaftaran_sidang_id');
    }
    
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function penggugat()
    {
        return $this->belongsTo(Mahasiswa::class, 'penggugat_id'); // Add this line
    }

    public function dokumen()
    {
        return $this->belongsTo(Dokumen::class, 'dokumen_id'); // Add this line
    }

    public function pembayarans()
    {
        return $this->hasMany(Pembayaran::class, 'detail_pendaftaran_id');
    }

    public function advokat()
    {
        return $this->belongsTo(Advokat::class, 'advokat_id');
    }

    // public function toArray()
    // {
    //     $advokat = $this->advokat;

    //     $pembayaran = Pembayaran::where('detail_pendaftaran_id', $this->id)->get();

    //     $totalPanjarPerkara = $pembayaran->sum('pemasukan');

    //     $statusPembayaran = $pembayaran->sum('sisa') === 0 ? 'sudah dibayar' : 'belum dibayar';

    //     $pembayaranTerbaru = $pembayaran->sortByDesc('tanggal_perkara')->first();

    //     return [
    //         'id' => $this->id,
    //         'nama_lengkap' => $advokat->nama_lengkap ?? null,
    //         'nomor_rekening_advokat' => $advokat->no_rekening ?? null,
    //         'nama_akun_bank' => $advokat->nama_akun_bank ?? null,
    //         'bank' => $advokat->bank ?? null,
    //         'panjar_perkara' => $totalPanjarPerkara,
    //         'status_pembayaran' => $statusPembayaran,
    //         'tanggal_pembayaran' => $pembayaranTerbaru?->tanggal_perkara 
    //             ? $pembayaranTerbaru->tanggal_perkara->translatedFormat('l, d F Y') 
    //             : 'Belum ada pembayaran',
    //         'jam_pembayaran' => $pembayaranTerbaru?->created_at 
    //             ? $pembayaranTerbaru->created_at->format('H:i:s') 
    //             : 'Belum ada pembayaran',
    //     ];
    // }
}