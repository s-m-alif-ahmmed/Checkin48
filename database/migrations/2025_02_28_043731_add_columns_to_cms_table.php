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
        Schema::table('cms', function (Blueprint $table) {
            $table->string('banner_image_mobile')->nullable()->after('banner_image');
            $table->json('button_title')->nullable()->after('title');
            $table->string('button_url')->nullable()->after('button_title');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cms', function (Blueprint $table) {
            $table->dropColumn(['banner_image_mobile', 'button_title', 'button_url']);
        });
    }
};
