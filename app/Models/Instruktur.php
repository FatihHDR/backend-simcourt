<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Filament\Models\Contracts\HasTenants;
use Illuminate\Support\Collection;

class Instruktur extends Authenticatable implements JWTSubject, HasTenants 
{
    use HasFactory;

    public function canAccessTenant(\Illuminate\Database\Eloquent\Model $tenant): bool
    {
        return true; // Example: Allow access to all tenants
    }

    /**
     * Get the tenants associated with the instructor for the given panel.
     *
     * @param \Filament\Panel $panel
     * @return \Illuminate\Support\Collection
     */
    public function getTenants(\Filament\Panel $panel): Collection
    {
        // If the `Instruktur` model is associated with a tenant model like `Team`, return it.
        // Otherwise, return an empty collection.
        return collect(); // Replace with `$this->teams` or similar if applicable.
    }

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