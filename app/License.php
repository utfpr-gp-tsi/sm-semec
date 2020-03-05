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
        'server_id',
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function servers()
    {
        return $this->belongsTo(Server::class, 'server_id');
    }
}
