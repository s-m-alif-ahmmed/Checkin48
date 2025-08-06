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
        if (!Schema::hasTable('reviews')) {
            Schema::create('reviews', function (Blueprint $table) {
                $table->id(); // Primary key
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users table
                $table->foreignId('villa_id')->constrained('villas')->onDelete('cascade'); // Foreign key to villas table
                $table->string('rating'); // Rating value, stored as a string
                $table->string('comment')->nullable(); // Comment, optional
                $table->enum('status', ['active', 'inactive'])->default('active'); // Enum for status
                $table->timestamps(); // created_at and updated_at columns
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
