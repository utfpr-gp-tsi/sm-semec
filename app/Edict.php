<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeFormatter;

class Edict extends Model
{
    use DateTimeFormatter;

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
}
