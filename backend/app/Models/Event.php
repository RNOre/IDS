<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public function educInst()
    {
        return $this->belongsTo(EducInst::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function partificationFact()
    {
        return $this->belongsTo(PartificationFact::class);
    }


}
