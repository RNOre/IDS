<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function averageBall()
    {
        return $this->hasMany(AverageBall::class);
    }

    public function studentGroupRegistration()
    {
        return $this->hasMany(StudentGroupRegistration::class);
    }

    public function partificationFact()
    {
        return $this->hasMany(PartificationFact::class);
    }

    public function indivAchivBall()
    {
        return $this->hasMany(IndivAchivBall::class);
    }
}
