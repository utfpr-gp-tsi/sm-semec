<?php

namespace App\Services;

class DateTimeFormatter
{
    public const SHORT_DATE = 'd/m/Y';
    public const SHORT_DATE_TIME = 'd/m/Y H:i';
   
    /**
     * @param  string  $date
     * @param  string  $format
     *
     * @return string
     */
    public static function format($date, $format = self::SHORT_DATE)
    {
        return \Carbon\Carbon::parse($date)->format($format);
    }
}
