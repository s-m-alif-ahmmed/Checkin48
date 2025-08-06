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
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->enum('platform', [
                'facebook',
                'tiktok',
                'twitter',
                'instagram',
                'youtube',
                'linkedin',
                'pinterest',
                'snapchat',
                'reddit',
                'whatsapp',
            ]);
            $table->string('link')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
            $table->softDeletes();
        });

        DB::table('social_media')->insert([
            ['platform' => 'twitter', 'link' => 'https://www.twitter.com/', 'status' => 'active'],
            ['platform' => 'linkedin', 'link' => 'https://www.linkedin.com/', 'status' => 'active'],
            ['platform' => 'instagram', 'link' => 'https://www.instagram.com/', 'status' => 'active'],
            ['platform' => 'facebook', 'link' => 'https://www.facebook.com/', 'status' => 'active'],
            ['platform' => 'tiktok', 'link' => 'https://www.tiktok.com/', 'status' => 'active'],
            ['platform' => 'youtube', 'link' => 'https://www.youtube.com/', 'status' => 'active'],
            ['platform' => 'pinterest', 'link' => 'https://www.pinterest.com/', 'status' => 'active'],
            ['platform' => 'snapchat', 'link' => 'https://www.snapchat.com/', 'status' => 'active'],
            ['platform' => 'reddit', 'link' => 'https://www.reddit.com/', 'status' => 'active'],
            ['platform' => 'whatsapp', 'link' => 'https://www.whatsapp.com/', 'status' => 'active'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_media');
    }
};
