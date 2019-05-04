<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable=['bidamt','status','phone_id','user_id'];

    public function phone()
    {
        return $this->belongsTo(Phone::class);
    }
}
