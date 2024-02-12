<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->nullable();
            $table->foreignId('addrole_id')->nullable();
            $table->foreignId('role_id');
            $table->string('user_name');
            $table->integer('user_ic', 12);
            $table->integer('user_age');
            $table->string('user_address');
            $table->integer('user_hp');
            $table->string('user_photopath');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
