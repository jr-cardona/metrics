<?php

namespace App\Helpers;

use App\Models\User;

class UserHelper
{
    public static function getDefaultLoginCredentials(string $field): string
    {
        $credentials = [
            'email' => '',
            'password' => '',
        ];

        if (config('app.env') !== 'production') {
            $user = User::query()->first(['email']);
            $credentials['email'] = $user->email;
            $credentials['password'] = 'password';
        }

        return $credentials[$field] ?? '';
    }
}
