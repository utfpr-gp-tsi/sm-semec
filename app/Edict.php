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
        'title',
        'description',
        'started_at',
        'ended_at',
        
       
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
    
   
     /**
     * @param string $term
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public static function search($term)
    {
        if ($term) {
            $searchTerm = "%{$term}%";
            return Edict::where('title', 'LIKE', $searchTerm)
                          ->orderBy('started_at', 'desc')
                          ->paginate(20);
        }
        $edicts = Edict::orderBy('started_at', 'desc')->paginate(20);

        return $edicts;

       
    }



}
