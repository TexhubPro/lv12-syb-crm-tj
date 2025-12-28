<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sub_orders', function (Blueprint $table) {
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete();
            $table->foreign('order_type_id')->references('id')->on('order_types')->nullOnDelete();
            $table->foreign('cornice_type_id')->references('id')->on('cornice_types')->nullOnDelete();
            $table->foreign('fabric_code_id')->references('id')->on('fabric_codes')->nullOnDelete();
            $table->foreign('profile_color_id')->references('id')->on('profile_colors')->nullOnDelete();
            $table->foreign('control_type_id')->references('id')->on('control_types')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('sub_orders', function (Blueprint $table) {
            $table->dropForeign(['order_id']);
            $table->dropForeign(['order_type_id']);
            $table->dropForeign(['cornice_type_id']);
            $table->dropForeign(['fabric_code_id']);
            $table->dropForeign(['profile_color_id']);
            $table->dropForeign(['control_type_id']);
        });
    }
};
