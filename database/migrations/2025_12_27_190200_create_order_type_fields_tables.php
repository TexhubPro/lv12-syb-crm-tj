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
        Schema::create('order_type_fields', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('key')->unique();
            $table->timestamps();
        });

        Schema::create('order_type_order_type_field', function (Blueprint $table) {
            $table->foreignId('order_type_id')->constrained()->cascadeOnDelete();
            $table->foreignId('order_type_field_id')->constrained()->cascadeOnDelete();
            $table->primary(['order_type_id', 'order_type_field_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_type_order_type_field');
        Schema::dropIfExists('order_type_fields');
    }
};
