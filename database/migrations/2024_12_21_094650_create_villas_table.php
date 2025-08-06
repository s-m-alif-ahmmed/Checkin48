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
        if (!Schema::hasTable('villas')) {
            Schema::create('villas', function (Blueprint $table) {
                $table->id(); // Primary key
                $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
                $table->foreignId('country_id')->nullable();
                $table->foreignId('city_id')->nullable();
                $table->json('title')->nullable();
                $table->decimal('price',10,2)->nullable();
                $table->json('description')->nullable();
                $table->json('full_address')->nullable();
                $table->json('map_location')->nullable();

                $table->enum('property_type', ['Villa', 'Apartment'])->default('Villa');
                $table->foreignId('property_label_id')->nullable();
                $table->integer('room')->nullable();
                $table->integer('bathroom')->nullable();
                $table->integer('balcony')->nullable();
                $table->integer('kitchen')->nullable();
                $table->integer('living_room')->nullable();
                $table->integer('bar')->nullable();
                $table->integer('pool')->nullable();
                $table->integer('garage')->nullable();

                $table->time('check_in_time')->nullable();
                $table->time('check_out_time')->nullable();
                $table->integer('adults')->nullable();
                $table->integer('childrens')->nullable();
                $table->integer('infants')->nullable();
                $table->integer('pets')->nullable();
                $table->json('villa_rules')->nullable();

                $table->longText('signature')->nullable();

                $table->boolean('payment_option')->nullable()->default(true);

                $table->string('slug')->nullable();

                $table->enum('status', ['active', 'pending', 'inactive'])->default('pending');
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
        Schema::dropIfExists('villas');
    }
};
