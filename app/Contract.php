<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\DateTimeFormatter;

class Contract extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'registration',
        'admission_at',
        'termination_at',
        'secretary',
        'place',
        'role',
        'link',
        'servant_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servant()
    {
        return $this->belongsTo(Servant::class, 'servant_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function acts()
    {
        return $this->hasMany(Act::class, 'contract_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function licenses()
    {
        return $this->hasMany(License::class, 'contract_id');
    }
}
