<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MerchantDetails extends Model
{
    protected $fillable=['user_id','mobile','bank','beneficiary','account','ifsc','cname','ckeypersonname','caddress','deliver_cityid','pincode','cin','caadhar','gstin','pan','financial','period','score','marketedby','aadharphoto','mouphoto'];
}
