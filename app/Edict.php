<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\DateTimeFormatter;

class Edict extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'started_at',
        'ended_at',
        'pdf',
        
       
    ];

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'started_at', 'ended_at',
    ];
    protected $appends = [
        'pdf_path',
    ];
    
    /**
    * @param string $value
    */
    public function getStartedAtAttribute($value): string
    {
        return DateTimeFormatter::format($value, DateTimeFormatter::SHORT_DATE_TIME);
    }

    /**
    * @param string $value
    */
    public function getEndedAtAttribute($value): string
    {
        return DateTimeFormatter::format($value, DateTimeFormatter::SHORT_DATE_TIME);
    }
    public static function search($term)
    {
        if ($term) {
            $searchTerm = "%{$term}%";
            return Edict::query()->where('name', 'LIKE', $searchTerm)->get();
        }

        return Edict::all();
    }

}
