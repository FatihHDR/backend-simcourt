<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    use HasFactory;

    protected $table = 'student_groups';

    protected $fillable = [
        'group_id',
        'mahasiswa_id',
        'status'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
    }
}