<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeFormatter;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Edict extends Model
{
    use DateTimeFormatter;
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'started_at',
        'ended_at',
    ];

    protected $dates = [
        'started_at',
        'ended_at'
    ];

    /**
     * @param string $term
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function search($term)
    {
        if ($term) {
            $searchTerm = "%{$term}%";
            return Edict::where('title', 'LIKE', $searchTerm)
                ->orderBy('started_at', 'desc')
                ->paginate(20);
        }
        return Edict::orderBy('started_at', 'desc')->paginate(20);
    }

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function pdfs()
    {
        return $this->hasMany(Pdf::class, 'edict_id');
    }

     /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'edict_id');
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
