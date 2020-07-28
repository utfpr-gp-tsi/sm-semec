<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\DateTimeFormatter;

class Act extends Model
{
    /**
    * @var array
    */
    protected $fillable = [
        'name',
        'started_at',
        'ended_at',
        'number',
        'time',
        'contract_id',
    ];

    protected $dates = [
        'started_at',
        'ended_at'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }
}
