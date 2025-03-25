<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalCase extends Model
{
    use HasFactory;

    protected $table = 'cases';

    protected $fillable = [
        'title',
        'description',
        'status',
        'payment_status',
        'lawyer_id',
    ];

    public function lawyer()
    {
        return $this->belongsTo(Mahasiswa::class, 'lawyer_id');
    }
}