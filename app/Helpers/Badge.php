<?php

namespace App\Helpers;

class Badge{
    /**
     * @param $type
     * @param $title
     * @return string
     */
    public static function set($type, $title): string {
        return "<span class='badge badge-$type'>$title</span>";
    }
}
