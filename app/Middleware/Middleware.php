<?php

namespace App\Middleware;

class Middleware
{
    public static function forGuest()
    {
        if (isset($_SESSION['id'])) return header('Location: /');
    }

    public static function forAuth()
    {
        if (!isset($_SESSION['id'])) return header('Location: /auth/signin');
    }
}
