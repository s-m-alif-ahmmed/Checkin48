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
        Schema::create('villa_off_dates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('villa_id')->nullable()->constrained('villas')->onDelete('cascade');
            $table->date('off_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villa_off_dates');
    }
};
