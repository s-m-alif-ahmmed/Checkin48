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
        if (!Schema::hasTable('villa_amenities')) {
            Schema::create('villa_amenities', function (Blueprint $table) {
                $table->id();
                $table->foreignId('villa_id')->constrained('villas')->onDelete('cascade');
                $table->foreignId('amenity_id')->constrained('amenities')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villa_amenities');
    }
};
