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
        if (!Schema::hasTable('why_book_villas')) {
            Schema::create('why_book_villas', function (Blueprint $table) {
                $table->id();
                $table->string('icon')->nullable();
                $table->json('title')->nullable();
                $table->json('description')->nullable();
                $table->string('slug')->nullable();
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
        Schema::dropIfExists('why_book_villas');
    }
};
