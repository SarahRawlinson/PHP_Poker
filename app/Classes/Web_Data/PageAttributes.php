<?php
namespace App\Classes\Web_Data;
class PageAttributes
{
    static array $PageLinks = [
        ['link' => 'home', 'title' => 'Home', 'login_needed' => 0],
        ['link' => 'about', 'title' => 'About', 'login_needed' => 0],
        ['link' => 'posts.create', 'title' => 'Create Post', 'login_needed' => 1],
        ['link' => 'create-new-game', 'title' => 'Poker', 'login_needed' => 1],
        ['link' => 'login', 'title' => 'Login', 'login_needed' => -1],
        ['link' => 'register', 'title' => 'Register', 'login_needed' => -1],
        ['link' => 'logout', 'title' => 'Logout', 'login_needed' => 1],
        ['link' => 'todo-list', 'title' => 'To Do', 'login_needed' => 1],
        ['link' => 'find-game', 'title' => 'Join Game', 'login_needed' => 1]
    ];
    /**
     * @return array|string[][]
     */
    static function GetPageAttributes(): array
    {
        return self::$PageLinks;
    }
}
