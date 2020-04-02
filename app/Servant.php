<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servant extends Model
{
    /**
    * @var array
    */
    protected $fillable = [
        'servant',
        'registration',
        'birth',
        'natural_from',
        'marital_status',
        'mother_name',
        'father_name',
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
        return $this->hasMany(Dependent::class, 'servant_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function contracts()
    {
        return $this->hasMany(Contract::class, 'servant_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function licenses()
    {
        return $this->hasMany(License::class, 'servant_id');
    }
}
