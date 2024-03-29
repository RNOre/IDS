<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroup extends Model
{
    use HasFactory;

    protected $table = 'student_groups';

    public function educInst()
    {
        return $this->belongsTo(EducInst::class);
    }

    public function studentGroupRegistration()
    {
        return $this->hasMany(StudentGroupRegistration::class);
    }
}
