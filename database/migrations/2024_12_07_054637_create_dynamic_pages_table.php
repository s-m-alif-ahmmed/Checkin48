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
        if (!Schema::hasTable('dynamic_pages')) {
            Schema::create('dynamic_pages', function (Blueprint $table) {
                $table->id();
                $table->json('page_title')->nullable(false);
                $table->string('page_slug')->nullable(false);
                $table->json('page_content')->nullable(false);

                $table->enum('status', ['active', 'inactive'])->default('active')->nullable(false);

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
        Schema::dropIfExists('dynamic_pages');
    }
};
