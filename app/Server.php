<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    /**
    * @var array
    */
    protected $fillable = [
        'server',
        'registration',
        'birth',
        'natural from',
        'marital status',
        'mother name',
        'father name',
        'CPG',
        'RG',
        'PIS',
        'CTPS',
        'title',
        'address',
        'phone',
        'email',
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function dependents()
    {
        return $this->hasMany(Dependent::class, 'server_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function contracts()
    {
        return $this->hasMany(Contract::class, 'server_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function licenses()
    {
        return $this->hasMany(License::class, 'server_id');
    }
}
