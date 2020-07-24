<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\DataTimeFormatter;

class Unit extends Model
{
    /**
    * @var array
    */
    protected $fillable = [
        'name',
        'address',
        'phone',
    ];
}
