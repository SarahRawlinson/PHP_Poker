<?php
//namespace App\Classes\Web_Data;
class PageAttributes
{
    static array $PageLinks = [
        ['link' => 'home', 'title' => 'Home'],
        ['link' => 'about', 'title' => 'About'],
    ];

    /**
     * @return array|string[][]
     */
    static function GetPageAttributes(): array
    {
        return self::$PageLinks;
    }
}
