<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrangTua extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'name',
        'student_id',
        // 'class_id',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
