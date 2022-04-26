<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 1/24/2017
 * Time: 6:25 AM
 */

namespace Domain\Services;


class Time
{
    public static function unixNow()
    {
        return time();
    }
}