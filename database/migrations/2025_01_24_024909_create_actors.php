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
        Schema::create('actors', function (Blueprint $table) {
            $table->id(); // Primary key id (bigint auto_increment)
            $table->unsignedBigInteger('cast_id'); // Foreign key
            $table->unsignedBigInteger('film_id'); // Foreign key
            $table->string('name', 255);
            $table->timestamps();

            $table->foreign('cast_id')->references('id')->on('casts')->onDelete('cascade');
            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('actors');
    }
};
