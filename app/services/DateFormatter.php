<?php

namespace App\Services;

class DateFormatter
{
    /**
     * @param  string  $value
     */
    public static function short($value): string
    {
        return \Carbon\Carbon::parse($value)->format('d/m/y H:i');
    }

    /**
     * @param  string  $value
     */
    public static function shortDate($value): string
    {
        return \Carbon\Carbon::parse($value)->format('d/m/y');
    }
}
