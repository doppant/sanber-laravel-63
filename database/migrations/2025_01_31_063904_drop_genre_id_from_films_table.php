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
        Schema::table('films', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['genre_id']);
            // Now, drop the genre_id column
            $table->dropColumn('genre_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('films', function (Blueprint $table) {
            // If rolling back, add the genre_id column back
            $table->unsignedBigInteger('genre_id');
            // Recreate the foreign key constraint
            $table->foreign('genre_id')->references('id')->on('genres')->onDelete('cascade');
        });
    }
};
