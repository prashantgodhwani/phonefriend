<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable=['filename','phone_id'];

    public function phone()
    {
        return $this->belongsTo(Phone::class);
    }
}
