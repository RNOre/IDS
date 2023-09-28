<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndivAchivBall extends Model
{
    use HasFactory;

    public function typeIndivAchiv()
    {
        return $this->belongsTo(TypeIndivAchiv::class);
    }
    public function averageBall()
    {
        return $this->belongsTo(AverageBall::class);
    }
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
