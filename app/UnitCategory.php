<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\DateTimeFormatter;

class UnitCategory extends Model
{
    /**
    * @var array
    */
    protected $fillable = [
        'id',
        'name',
    ];
    
/**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unit()
    {
        return $this->hasMany(License::class, 'unitcategory_id');
    }
}
