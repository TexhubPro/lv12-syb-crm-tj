<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('sub_orders', function (Blueprint $table) {
            $table->string('note')->nullable();
            $table->string('corsage')->nullable();
            $table->string('tape')->nullable();
            $table->string('sewing')->nullable();
            $table->string('installation')->nullable();
            $table->string('motor')->nullable();
            $table->string('tiebacks')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('sub_orders', function (Blueprint $table) {
            $table->dropColumn([
                'note',
                'corsage',
                'tape',
                'sewing',
                'installation',
                'motor',
                'tiebacks',
            ]);
        });
    }
};
