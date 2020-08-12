<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\DateTimeFormatter;

class UnitCategory extends Model
{
    /**
    * @var array
    */
    protected $fillable = [
        'id',
        'name',
    ];
    
/**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function unit()
    {
        return $this->hasMany(License::class, 'unitcategory_id');
    }
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
