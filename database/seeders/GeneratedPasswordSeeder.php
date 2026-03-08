<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\GeneratedPassword;

class GeneratedPasswordSeeder extends Seeder
{
    public function run(): void
    {
        $passwords = [
            ['password' => 'Kj#9mNp$2xLqW', 'length' => 12, 'use_uppercase' => true, 'use_lowercase' => true, 'use_numbers' => true, 'use_symbols' => true, 'security_level' => 'Ultra Seguro', 'entropy' => 71.5],
            ['password' => 'abcdef123456', 'length' => 12, 'use_uppercase' => false, 'use_lowercase' => true, 'use_numbers' => true, 'use_symbols' => false, 'security_level' => 'Bajo', 'entropy' => 37.6],
            ['password' => 'AbCdEf123456', 'length' => 12, 'use_uppercase' => true, 'use_lowercase' => true, 'use_numbers' => true, 'use_symbols' => false, 'security_level' => 'Medio', 'entropy' => 56.4],
            ['password' => 'P@ssw0rd!2024', 'length' => 12, 'use_uppercase' => true, 'use_lowercase' => true, 'use_numbers' => true, 'use_symbols' => true, 'security_level' => 'Alto', 'entropy' => 64.2],
            ['password' => 'Qwerty12345!@', 'length' => 12, 'use_uppercase' => true, 'use_lowercase' => true, 'use_numbers' => true, 'use_symbols' => true, 'security_level' => 'Alto', 'entropy' => 62.8],
        ];

        foreach ($passwords as $password) {
            GeneratedPassword::create($password);
        }
    }
}
