<?php

namespace App\Services;

class DateFormatter
{
    /**
     * @return string
     * @param  \App\User  $value
     */
    public static function short($value)
    {
        return \Carbon\Carbon::parse($value)->format('d/m/y H:i');
    }
}
