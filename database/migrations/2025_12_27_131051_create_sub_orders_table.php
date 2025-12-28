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
        Schema::create('sub_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->cascadeOnDelete();
            $table->foreignId('order_type_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('cornice_type_id')->nullable()->constrained()->nullOnDelete();
            $table->string('order_kind')->nullable();
            $table->string('division')->nullable();
            $table->foreignId('fabric_code_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('profile_color_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('control_type_id')->nullable()->constrained()->nullOnDelete();
            $table->decimal('width', 10, 2)->default(0);
            $table->decimal('height', 10, 2)->default(0);
            $table->unsignedInteger('quantity')->default(0);
            $table->decimal('area', 12, 2)->default(0);
            $table->decimal('price', 12, 2)->default(0);
            $table->decimal('amount', 12, 2)->default(0);
            $table->decimal('discount', 12, 2)->default(0);
            $table->decimal('total', 12, 2)->default(0);
            $table->string('room')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_orders');
    }
};
