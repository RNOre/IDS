<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AverageBall extends Model
{
    use HasFactory;

    public function indivAchivBall()
    {
        return $this->hasMany(IndivAchivBall::class);
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
