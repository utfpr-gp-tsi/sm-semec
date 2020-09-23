<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeFormatter;
use Illuminate\Support\Facades\DB;

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

    /**
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function pdfs()
    {
        return $this->hasMany(Pdf::class, 'edict_id');
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

    public static function anoTeste()
    {
        $ordersByWeek = Edict::select([
            DB::raw('count(id) as title'),
            DB::raw('year(started_at) as year')
        ])
        ->groupBy(['year'])
        ->get();    

        return $ordersByWeek;
    }
}
