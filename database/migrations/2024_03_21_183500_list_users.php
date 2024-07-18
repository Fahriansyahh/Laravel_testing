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
        Schema::create('list_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId("management_id");
            $table->foreignId("user_id");
            $table->string('slug')->unique();
            $table->string('nama');
            $table->integer("umur");
            $table->string("images")->nullable();
            $table->boolean("married")->default(false);
            $table->text('description');
            $table->string('about');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list_users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
