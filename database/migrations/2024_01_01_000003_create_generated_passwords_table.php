<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('generated_passwords', function (Blueprint $table) {
            $table->id();
            $table->string('password');
            $table->integer('length');
            $table->boolean('use_uppercase')->default(false);
            $table->boolean('use_lowercase')->default(true);
            $table->boolean('use_numbers')->default(true);
            $table->boolean('use_symbols')->default(false);
            $table->string('security_level');
            $table->float('entropy');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('generated_passwords');
    }
};
