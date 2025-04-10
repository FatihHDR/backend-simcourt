<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Filament\Models\Contracts\HasTenants;
use Illuminate\Support\Collection;

class Instruktur extends Authenticatable implements JWTSubject
{
    use HasFactory;

    protected $table = 'instrukturs';

    protected $fillable = [
        'name',
        'nip',
        'email',
        'password',
        'role',
        'is_admin',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function classes()
    {
        return $this->hasMany(Kelas::class);
    }

    public function students()
    {
        return $this->hasManyThrough(Mahasiswa::class, Kelas::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey(); // Return the primary key of the model (e.g., `id`)
    }

    public function getJWTCustomClaims()
    {
        return []; // You can return custom claims here if needed (e.g., roles, permissions)
    }

    public function isAdmin(): bool
    {
        return $this->is_admin; // Pastikan kolom `is_admin` ada di tabel `instrukturs`
    }
}