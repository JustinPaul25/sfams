<?php

namespace App;

use App\Models\Notification;


class App
{

    public static function get()
    {

        return [
            'is_auth' => auth()->check(),
            'current_user' => auth()->check() ? auth()->user() : null,
            'is_student' => auth()->check() ? auth()->user()->isStudent() : null,
            'is_staff' => auth()->check() ? auth()->user()->isStaff() : null,
            'is_admin' => auth()->check() ? auth()->user()->isAdmin() : null,
            'logs' => Notification::with('user')->get(),
            'app_logo' => url('img/logo.jpg'),
        ];
    }
}