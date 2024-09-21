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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique(); // Custom order ID with prefix
            $table->string('name');
            $table->string('mobile');
            $table->string('address_line_one');
            $table->string('address_line_two')->nullable();
            $table->string('pin');
            $table->string('city');
            $table->string('state');
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('package_id')->nullable()->constrained()->onDelete('cascade');
            $table->json('selected_attributes')->nullable();
            $table->string('client_ip')->nullable();
            $table->text('source')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
