<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{

    public function phones()
    {
        return $this->belongsToMany(Phone::class);
    }
}
