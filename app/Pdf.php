<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pdf extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
       'pdf',
       'name',
       'edict_id'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function edict()
    {
        return $this->belongsTo(Edict::class, 'edict_id');
    }

    /**
    * @return $this
    */
    public function saveWithoutEvents(array $options = [])
    {
        return static::withoutEvents(function () use ($options) {
            return $this->save($options);
        });
    }
}
