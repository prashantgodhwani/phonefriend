<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    public function phones()
    {
        return $this->belongsToMany(Phone::class);
    }
}
