<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class InitialAdmin
{
    /**
     * Crée ou retourne l'utilisateur admin par défaut.
     *
     * @return User
     */
    public static function create(): User
    {
        $email = config('mail.from.address');
        $name  = config('app.name');
        $phone  = config('app.phone');

        if (!$email || !$name) {
            throw new \RuntimeException('Admin email or name is missing in config.');
        }

        return User::firstOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'phone' => $phone,
                'student_number' => 'ADMIN', // identifiant unique pour l’admin
                'role' => 'admin',
                'password' => Hash::make('password'),
                'is_active' => true,
            ]
        );
    }
}
