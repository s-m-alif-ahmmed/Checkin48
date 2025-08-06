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
        if (!Schema::hasTable('our_missions')) {
            Schema::create('our_missions', function (Blueprint $table) {
                $table->id();
                $table->json('title')->nullable();
                $table->json('sub_title')->nullable();
                $table->string('media')->nullable();
                $table->json('heading_one_title')->nullable();
                $table->json('heading_one_description')->nullable();
                $table->json('heading_two_title')->nullable();
                $table->json('heading_two_description')->nullable();
                $table->json('heading_three_title')->nullable();
                $table->json('heading_three_description')->nullable();
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
        Schema::dropIfExists('our_missions');
    }
};
