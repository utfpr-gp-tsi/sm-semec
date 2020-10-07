<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Edict;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pdf extends Model
{
    use HasFactory;
    
    /**
     * @var array
     */
    protected $fillable = [
     'pdf',
     'name',
     'edict_id'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function edict()
    {
        return $this->belongsTo(Edict::class, 'edict_id');
    }

    /**
     * @param string $term
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public static function search($term)
    {
        if ($term) {
            $searchTerm = "%{$term}%";
            return Pdf::where('name', 'LIKE', $searchTerm)
                ->orderBy('created_at', 'desc')
                ->paginate(5);
        }
        return Pdf::orderBy('created_at', 'desc')->paginate(5);
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
