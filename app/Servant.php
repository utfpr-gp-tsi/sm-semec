<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Services\DateTimeFormatter;

class Servant extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'birthed_at',
        'natural_from',
        'marital_status',
        'mother_name',
        'father_name',
        'CPF',
        'RG',
        'PIS',
        'CTPS',
        'title',
        'address',
        'phone',
        'email',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function dependents()
    {
        return $this->hasMany(Dependent::class, 'servant_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contracts()
    {
        return $this->hasMany(Contract::class, 'servant_id')->orderBy('admission_at', 'desc');
    }

    /**
     * @return Contract
     */
    public function lastContract()
    {
        return $this->contracts->first() ?: new Contract();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function licenses()
    {
        return $this->hasManyThrough(License::class, Contract::class, 'servant_id', 'contract_id');
    }

    /**
     * @param string $value
     */
    public function getBirthedAtAttribute($value): string
    {
        return DateTimeFormatter::format($value);
    }

    /**
     * @param string $value
     */
    public function getCreatedAtAttribute($value): string
    {
        return DateTimeFormatter::format($value);
    }

    /**
     * @param string $value
     */
    public function getUpdatedAtAttribute($value): string
    {
        return DateTimeFormatter::format($value);
    }

    /**
     * @param string $term
     * @return \Illuminate\Database\Eloquent\Collection<\App\Servant>
     */
    public static function search($term)
    {
        if ($term) {
            $searchTerm = "%{$term}%";
            return Servant::query()->with(['contracts'])
                                   ->where('name', 'LIKE', $searchTerm)
                                   ->orWhere('CPF', 'LIKE', $searchTerm)
                                   ->orderBy('name', 'asc')
                                   ->paginate(20);
        }

        return Servant::with(['contracts'])->paginate(20);
    }
}
