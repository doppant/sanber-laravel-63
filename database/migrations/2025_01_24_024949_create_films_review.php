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
        Schema::create('films_review', function (Blueprint $table) {
            $table->id(); // Primary key id (bigint auto_increment)
            $table->unsignedBigInteger('user_id'); // Foreign key
            $table->unsignedBigInteger('film_id'); // Foreign key
            $table->text('content');
            $table->integer('point');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('film_id')->references('id')->on('films')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('films_review');
    }
};
