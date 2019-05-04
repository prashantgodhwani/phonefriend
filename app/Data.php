<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Data extends Model
{

    protected $fillable=['model','company','storage','price','modelno'];

    use Searchable;

    public function phones(){
        return $this->hasMany(Phone::class);
    }

    public function getSlugAttribute()
    {
        $title=$this->company.' '.$this->model.' '.$this->storage.' GB';
        return str_slug($title);
    }


}
