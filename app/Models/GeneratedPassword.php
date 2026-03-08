<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneratedPassword extends Model
{
    protected $fillable = [
        'password',
        'length',
        'use_uppercase',
        'use_lowercase',
        'use_numbers',
        'use_symbols',
        'security_level',
        'entropy',
    ];

    protected $casts = [
        'use_uppercase' => 'boolean',
        'use_lowercase' => 'boolean',
        'use_numbers' => 'boolean',
        'use_symbols' => 'boolean',
        'entropy' => 'float',
    ];
}
