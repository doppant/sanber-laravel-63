<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('films_review', function (Blueprint $table) {
        // Drop the old foreign key and column if it exists
        $table->dropForeign(['user_id']);
        
        // Recreate the foreign key constraint
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('films_review', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->foreign('user_id')->references('id')->on('users_account')->onDelete('cascade');
    });
}

};
