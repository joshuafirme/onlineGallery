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
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->float('priceWith')->default('1.00');
            $table->float('priceWithout')->default('2.00');
            $table->integer('validityDays');
            $table->timestamps();
        });

        DB::table('pricings')->insert([
            'priceWith' => '1.00',
            'priceWithout' => '2.00',
            'validityDays' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricings');
    }
};
