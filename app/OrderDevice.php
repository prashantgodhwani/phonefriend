<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDevice extends Model
{
    protected $fillable=['order_id','phone_id','phone_color','status','warranty_duration'];

    public function order(){
        return $this->belongsTo(Order::class);
    }

    public function phone(){
        return $this->belongsTo(Phone::class);
    }
}
