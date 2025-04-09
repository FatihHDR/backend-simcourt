<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Mahasiswa extends Model implements JWTSubject, AuthenticatableContract {
    use HasFactory, Authenticatable;

    protected $table = 'mahasiswas';

    protected $fillable = [
        'nim',
        'name',
        'email',
        'password',
        'role', // e.g., 'penggugat', 'tergugat', 'saksi', 'penasihat_hukum'
        'kelas_id',
        'status',
    ];

    public function groups() {
        return $this->belongsToMany(Group::class, 'student_groups', 'mahasiswa_id', 'group_id');
    }

    public function studentGroups() {
        return $this->hasMany(StudentGroup::class, 'mahasiswa_id');
    }

    public function kelas() {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }

    public function Advokat() {
        return $this->hasMany(Advokat::class, 'mahasiswa_id');
    }

    public function cases() {
        return $this->hasMany(LegalCase::class);
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function students() {
        return $this->belongsToMany(Kelas::class);
    }

    public function getJWTCustomClaims() {
        return [];
    }
}
