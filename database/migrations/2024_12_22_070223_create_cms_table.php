<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('cms')) {
            Schema::create('cms', function (Blueprint $table) {
                $table->id();
                $table->json('banner_title')->nullable();
                $table->json('sub_title')->nullable();
                $table->string('banner_image')->nullable();

                $table->json('page_title')->nullable();
                $table->json('page_description')->nullable();
                $table->string('page_image')->nullable();

                $table->json('title')->nullable();
                $table->string('image')->nullable();
                $table->enum('status', ['active', 'inactive'])->default('active')->nullable();
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
        Schema::dropIfExists('cms');
    }
};
