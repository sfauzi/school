<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = ['name', 'class_id'];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'class_id');
    }
}
