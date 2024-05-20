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
        Schema::create('shortlinks', function (Blueprint $table) {
            $table->id(); // This is the ID of the shortlink
            $table->bigInteger('user_id')->unsigned(); // This is the user that created the shortlink
            $table->string('url')->unique(); // This is the shortlink that a user will visit
            $table->string('destination'); // This is the URL that the shortlink will redirect to
            $table->string('title')->nullable(); // This is the title of the shortlink that will be displayed
            $table->dateTime('expires_at')->nullable(); // This is the date that the shortlink will expire and no longer be accessible
            $table->boolean('is_disabled')->default(false); // This is the flag that will disable the shortlink
            $table->boolean('is_custom')->default(false); // This is the flag that will determine if the shortlink is custom, only for administration purposes
            $table->timestamps(); // This is the created_at and updated_at columns

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shortlinks');
    }
};
