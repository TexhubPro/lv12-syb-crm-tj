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
        Schema::table('order_type_order_type_field', function (Blueprint $table) {
            $table->unsignedInteger('sort')->default(0)->after('order_type_field_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('order_type_order_type_field', function (Blueprint $table) {
            $table->dropColumn('sort');
        });
    }
};
