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
        if (!Schema::hasTable('credentials')) {
            Schema::create('credentials', function (Blueprint $table) {
                $table->id();
                $table->string('facebook_client_id')->nullable();
                $table->string('facebook_client_secret_id')->nullable();
                $table->string('google_client_id')->nullable();
                $table->string('google_client_secret_id')->nullable();
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
        Schema::dropIfExists('credentials');
    }
};
