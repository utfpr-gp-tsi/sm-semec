<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workload extends Model
{
    use HasFactory;

    /**
    * @var array
    */
    protected $fillable = [
        'workload'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasOne
    */
    public function servantCompletaryDatas()
    {
        return $this->hasOne(ServantCompletaryData::class);
    }
}
