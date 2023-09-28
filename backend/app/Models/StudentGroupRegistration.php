<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGroupRegistration extends Model
{
    use HasFactory;

    protected $table = 'student_group_registrations';

    public function studentGroup()
    {
        return $this->belongsTo(StudentGroup::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
