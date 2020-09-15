<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UnitCategory;

class Unit extends Model
{
     /**
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'phone',
        'category_id',
    ];

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(UnitCategory::class, 'category_id');
    }

     /**
     * @param string $term
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function search($term)
    {
        if ($term) {
            $searchTerm = "%{$term}%";
            return Unit::query()->with(['category'])
                ->where('name', 'LIKE', $searchTerm)
                ->orderBy('name', 'desc')
                ->paginate(20);
        }
        return Unit::with(['category'])->orderBy('name', 'desc')->paginate(20);
    }
}
