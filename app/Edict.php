<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\CreatedAndUpdatedAtFormatted;

class Edict extends Model
{

    use CreatedAndUpdatedAtFormatted;
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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'started_at', 'ended_at',
    ];
  
   
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
