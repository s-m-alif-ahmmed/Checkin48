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
        if (!Schema::hasTable('topbars')) {
            Schema::create('topbars', function (Blueprint $table) {
                $table->id();
                $table->string('phone')->nullable();
                $table->string('email')->nullable();
                $table->enum('status', ['active', 'inactive'])->nullable()->default('active');
                $table->timestamps();
                $table->softDeletes();
            });
        }

        DB::table('topbars')->insert([
            'phone' => null,
            'email' => null,
            'status' => 'active',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topbars');
    }
};
