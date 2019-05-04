<?php

/**
 * Created by PhpStorm.
 * User: prashant.godhwani
 * Date: 18-01-2018
 * Time: 20:05
 */

namespace App\Filters;

use Mnabialek\LaravelEloquentFilter\Filters\SimpleQueryFilter;

class DataFilter extends SimpleQueryFilter
{
    protected $simpleFilters = ['company','storage'];

    protected $simpleSorts = ['id','email','created_at'];
}