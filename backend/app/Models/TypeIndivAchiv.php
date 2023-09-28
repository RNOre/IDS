<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeIndivAchiv extends Model
{
    use HasFactory;

    public function indivAchivBall()
    {
        return $this->hasMany(IndivAchivBall::class);
    }
}
