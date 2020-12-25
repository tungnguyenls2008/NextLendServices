<?php

namespace App\Models\Services;

use Jenssegers\Mongodb\Eloquent\Model;

class CustomerType extends Model
{
    protected $collection='customer_type';
    protected $fillable=['type','fields'];
    protected $connection = 'mongodb';

}
