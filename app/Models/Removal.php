<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Removal extends Model
{
     use HasFactory;
     
    /**
     * @var array
     */

    protected $fillable = [
        'removal'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subscription()
    {
        return $this->hasMany(Subscription::class, 'removal_id');
    }
}
