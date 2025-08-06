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
        if (!Schema::hasTable('benefits_of_joinings')) {
            Schema::create('benefits_of_joinings', function (Blueprint $table) {
                $table->id();
                $table->json('title')->nullable();
                $table->json('sub_title')->nullable();
                $table->string('image')->nullable();
                $table->json('title_two')->nullable();
                $table->json('title_three')->nullable();
                $table->json('title_four')->nullable();
                $table->enum('status', ['active', 'inactive'])->nullable()->default('active');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('benefits_of_joinings');
    }
};
