<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    /**
    * @var array
    */
    protected $fillable = [
        'name',
        'birth',
        'degree',
        'study',
        'works',
        'servant_id'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function servants()
    {
        return $this->belongsTo(Servant::class, 'servant_id');
    }
}
