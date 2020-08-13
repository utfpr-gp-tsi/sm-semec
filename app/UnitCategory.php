<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UnitCategory extends Model
{
    
    protected $table = 'units_category';
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
    ];


    /**
     * @param string $term
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function search($term)
    {
        if ($term) {
            $searchTerm = "%{$term}%";
            return UnitCategory::where('name', 'LIKE', $searchTerm)
                ->orderBy('name', 'desc')
                ->paginate(20);
        }
        return UnitCategory::orderBy('name', 'desc')->paginate(20);
    }
}
