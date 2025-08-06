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
        Schema::table('villas', function (Blueprint $table) {
            $table->foreignId('price_type_id_one')->nullable()->constrained('price_types')->nullOnDelete()->after('title');
            $table->foreignId('price_type_id_two')->nullable()->constrained('price_types')->nullOnDelete()->after('price');
            $table->decimal('price_two', 10, 2)->nullable()->after('price_type_id_two');
            $table->foreignId('price_type_id_three')->nullable()->constrained('price_types')->nullOnDelete()->after('price_two');
            $table->decimal('price_three', 10, 2)->nullable()->after('price_type_id_three');
            $table->foreignId('price_type_id_four')->nullable()->constrained('price_types')->nullOnDelete()->after('price_three');
            $table->decimal('price_four', 10, 2)->nullable()->after('price_type_id_four');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('villas', function (Blueprint $table) {
            $table->dropColumn(['price_type_id_one', 'price_type_id_two', 'price_two', 'price_type_id_three', 'price_three', 'price_type_id_four', 'price_four']);
        });
    }
};
