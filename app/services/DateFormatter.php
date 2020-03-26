<?php

namespace App\Services;

class DateFormatter
{
    public static function short($value)
    {
        return date('d/m/y H:i', strtotime($value));
    }
}
