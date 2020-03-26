<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
        /**
    * @var array
    */
    protected $fillable = [
        'registration',
        'start date',
        'finish date',
        'license type',
        'days',
        'servant_id',
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function servants()
    {
        return $this->belongsTo(Servant::class, 'servant_id');
    }
}
