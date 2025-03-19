<?php

namespace App\Controller\Components;

use App\Utils\View;

class Alert
{
    public static function success(string $message): string
    {
        return View::render('components/alert', [
            'type' => 'success',
            'message' => $message
        ]);
    }

    public static function error(string $message): string
    {
        return View::render('components/alert', [
            'type' => 'danger',
            'message' => $message
        ]);
    }
}
