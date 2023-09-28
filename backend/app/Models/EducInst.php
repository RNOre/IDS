<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducInst extends Model
{
    use HasFactory;


    public function event()
    {
        return $this->hasMany(Event::class);
    }

    public function studentGroup()
    {
        return $this->hasMany(StudentGroup::class);
    }
}
