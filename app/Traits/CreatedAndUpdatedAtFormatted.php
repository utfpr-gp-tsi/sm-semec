<?php

namespace App\Traits;

use App\Services\DateTimeFormatter;

trait CreatedAndUpdatedAtFormatted
{
    /**
     * @param string $value
     */
    public function getCreatedAtAttribute($value): string
    {
        return DateTimeFormatter::format($value, DateTimeFormatter::SHORT_DATE_TIME);
    }

    /**
     * @param string $value
     */
    public function getUpdatedAtAttribute($value): string
    {
        return DateTimeFormatter::format($value, DateTimeFormatter::SHORT_DATE_TIME);
    }
}
