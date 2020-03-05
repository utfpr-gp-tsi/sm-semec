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
        'age',
        'degree',
        'study',
        'works',
        'server_id'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function servers()
    {
        return $this->belongsTo(Server::class, 'server_id');
    }
}
