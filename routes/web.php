<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\PasswordGenerator;

Route::get('/', PasswordGenerator::class);
