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
        'server_id ',
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function servers()
    {
        return $this->belongsTo(Server::class, 'server_id');
    }
}
