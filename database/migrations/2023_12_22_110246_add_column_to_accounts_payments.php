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
        Schema::table('accounts_payments', function (Blueprint $table) {
            $table->string('file_path')->nullable();
            $table->string('titleQR')->nullable();
            $table->string('nameQR')->nullable();
            $table->string('descriptionQR')->nullable();
            $table->string('shareQR')->nullable();
            $table->date('dateCreated')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('accounts_payments', function (Blueprint $table) {
            $table->dropColumn('file_path');
            $table->dropColumn('titleQR');
            $table->dropColumn('nameQR');
            $table->dropColumn('descriptionQR');
            $table->dropColumn('shareQR');
            $table->dropColumn('dateCreated');
        });
    }
};
