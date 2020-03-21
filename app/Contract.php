<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
        /**
    * @var array
    */
    protected $fillable = [
        'registration',
        'admission',
        'termination',
        'secretary',
        'place',
        'role',
        'servant_id ',
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function servant()
    {
        return $this->belongsTo(Servant::class, 'servant_id');
    }
}
