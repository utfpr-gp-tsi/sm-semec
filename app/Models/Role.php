<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

        /**
     * @var array
     */
    protected $fillable = [
       'name'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function moviments()
    {
        return $this->hasMany(Movement::class, 'role_id');
    }
}
