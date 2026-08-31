<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use InvalidArgumentException;

class AdminUserSeeder extends Seeder
{
    /**
     * Create or update the initial administrator account.
     */
    public function run(): void
    {
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');

        if (!$email || !$password) {
            throw new InvalidArgumentException(
                'ADMIN_EMAIL and ADMIN_PASSWORD must be defined in the .env file.'
            );
        }

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => 'Clinic Administrator',
                'password' => Hash::make($password),
                'role' => 'admin',
                'is_active' => true,
            ]
        );
    }
}