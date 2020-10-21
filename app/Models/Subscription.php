<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'removal_type',
        'reason',
        'unit_id',
        'contract_id',
        'servant_id',
        'edict_id'
    ];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servant()
    {
        return $this->belongsTo(Servant::class, 'subscription_id');
    }

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function contract()
    {
        return $this->belongsTo(Contract::class, 'contract_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function edict()
    {
        return $this->belongsTo(Edict::class, 'edict_id');
    }
}
