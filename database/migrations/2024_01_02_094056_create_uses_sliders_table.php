<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('uses_sliders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uses_id');
            $table->string('title');
            $table->string('image');

            $table->foreign('uses_id')
                ->references('id')
                ->on('uses')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uses_sliders');
    }
};
