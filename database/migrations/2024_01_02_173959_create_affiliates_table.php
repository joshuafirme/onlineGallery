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
        Schema::create('affiliates', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('account_name')->unique();
            $table->string('email')->unique();
            $table->string('contact_number')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('ig_link')->nullable();
            $table->string('tiktok_link')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=active,inactive=0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliates');
    }
};
