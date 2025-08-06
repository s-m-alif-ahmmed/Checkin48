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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('villa_id')->nullable()->constrained('villas')->nullOnDelete();
            $table->string('booking_id', 10)->unique();
            $table->string('country')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('number')->nullable();
            $table->string('people')->nullable();
            $table->date('check_in_date')->nullable();
            $table->date('check_out_date')->nullable();
            $table->integer('guest_count')->nullable();
            $table->integer('nights')->nullable();
            $table->decimal('villa_day_price', 10, 2)->nullable();
            $table->integer('tax_percent')->nullable();
            $table->decimal('tax', 10, 2)->nullable();
            $table->decimal('subtotal', 10, 2)->nullable();
            $table->decimal('total_amount', 10, 2)->nullable();
            $table->integer('loyalty_point_use')->nullable()->default(0);
            $table->integer('loyalty_point_earn')->nullable()->default(0);
            $table->decimal('hand_cash',10,2)->nullable();
            $table->decimal('online_payment',10,2)->nullable();
            $table->string('payment_method')->nullable();
            $table->boolean('payment_option')->nullable()->default(true);
            $table->enum('payment_status',['paid', 'unpaid'])->default('unpaid');
            $table->enum('status',['pending', 'approved', 'cancelled'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
