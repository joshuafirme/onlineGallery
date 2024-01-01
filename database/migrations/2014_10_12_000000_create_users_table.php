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
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('role_id');
            $table->string('profile_img')->nullable();
            $table->tinyInteger('user_type')->default(1)->comment('admin access=1, customer=2');
            $table->boolean('status')->default(1);
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('123456'),
            'role_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
