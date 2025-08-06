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
        Schema::create('footer_buttons', function (Blueprint $table) {
            $table->id();
            $table->json('title')->nullable();
            $table->json('button_one')->nullable();
            $table->json('button_two')->nullable();
            $table->json('button_three')->nullable();
            $table->json('button_four')->nullable();
            $table->json('button_five')->nullable();
            $table->string('button_one_url')->nullable();
            $table->string('button_two_url')->nullable();
            $table->string('button_three_url')->nullable();
            $table->string('button_four_url')->nullable();
            $table->string('button_five_url')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footer_buttons');
    }
};
