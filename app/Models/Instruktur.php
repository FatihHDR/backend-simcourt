<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Instruktur extends Authenticatable implements JWTSubject 
{
    use HasFactory;

    protected $table = 'instrukturs';

    protected $fillable = [
        'name',
        'nip',
        'email',
        'password'
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
}