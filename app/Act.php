<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Act extends Model
{
        /**
    * @var array
    */
    protected $fillable = [
        'act',
        'start',
        'validaty',
        'number',
        'time',
        'contract_id',
    ];
    
    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function contracts()
    {
        return $this->hasMany(Contract::class, 'server_id');
    }
}
