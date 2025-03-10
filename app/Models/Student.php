<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['name', 'class_id'];

    // Relasi ke Classroom
    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }

    public function parent()
    {
        return $this->hasOne(OrangTua::class, 'student_id');
    }
}
