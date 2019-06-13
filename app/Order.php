<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['deliver_fname','order_id','deliver_lname','deliver_phone','deliver_email', 'deliver_add1','deliver_add2','district','postcode','payment_mode','user_id','amount','nop','order_status','state'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderdevices(){
        return $this->hasMany(OrderDevice::class);
    }
}
