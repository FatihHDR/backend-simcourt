<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    protected $fillable = [
        'name',
        'class_id',
    ];

    public function students()
    {
        return $this->belongsToMany(Mahasiswa::class);
    }
    

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function studentGroups()
    {
        return $this->hasMany(StudentGroup::class, 'group_id');
    }
}
