<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\DateTimeFormatter;

class License extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'started_at',
        'ended_at',
        'license_type',
        'days',
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
