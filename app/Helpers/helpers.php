<?php

use Illuminate\Support\Carbon;

if (!function_exists('getTimeAgo')) {
    function getTimeAgo($carbonObject)
    {
        $date = Carbon::parse($carbonObject); // now date is a carbon instance
        $get_date =  $date->diffForHumans(Carbon::now());
        return str_replace("before", "ago", $get_date);
    }
}
