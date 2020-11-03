<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    /**
    * @var array
    */
    protected $fillable = [
        'started_at',
        'ended_at',
        'unit_id',
        'servant_completary_data_id',
        'role_id'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function servantCompletaryData()
    {
        return $this->belongsTo(ServantCompletaryData::class, 'servant_completary_data_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
