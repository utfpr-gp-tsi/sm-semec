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
        'birthed_at',
        'degree',
        'study',
        'works',
        'servant_id'
    ];

    protected $dates = [
        'birthed_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servant()
    {
        return $this->belongsTo(Servant::class, 'servant_id');
    }
}
