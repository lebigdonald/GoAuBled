<?php

use App\Models\Pages\ImageText;
use App\Post;
use Carbon\Carbon;

if(!function_exists('getSectionData')){

    function getSectionData(string $section) : Object
    {
        return ImageText::where('section', 'about')->latest()->first();
    }

}

if(!function_exists('formatDate')){

    function formatDate(string $date) : string
    {
        return Carbon::parse($date)->format('d.m.Y H:i');
    }

}

if(!function_exists('footerText')){

    function footerText() : string
    {
        return (ImageText::where('section', 'header')->latest()->first())->content;
    }

}

/**
 * Return a Carbon instance.
 * @param string $parseString
 * @param null|string $tz
 * @return Carbon
 */
function carbon(string $parseString = '', string $tz = null): Carbon
{
    return new Carbon($parseString, $tz);
}

/**
 * Return a formatted Carbon date.
 * @param Carbon $date
 * @param string $format
 * @return string
 */
function humanize_date(Carbon $date, string $format = 'd F Y, H:i'): string
{
    return $date->format($format);
}

?>
