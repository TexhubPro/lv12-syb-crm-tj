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
        Schema::table('order_types', function (Blueprint $table) {
            $table->enum('unit', ['piece', 'meter', 'square_meter'])->default('piece')->after('parent_id');
            $table->decimal('min_qty', 10, 2)->default(1)->after('unit');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_types', function (Blueprint $table) {
            $table->dropColumn(['unit', 'min_qty']);
        });
    }
};
