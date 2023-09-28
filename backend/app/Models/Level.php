<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    public function scale()
    {
        return $this->hasMany(Level::class);
    }

    public function event()
    {
        return $this->hasMany(Event::class);
    }
}
