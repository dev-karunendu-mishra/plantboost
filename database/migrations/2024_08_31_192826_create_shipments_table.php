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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->unique();
            $table->string('shipment_id')->unique();
            $table->string('awb_number')->nullable();
            $table->string('courier_id')->nullable();
            $table->string('courier_name')->nullable();
            $table->string('status')->nullable();
            $table->string('additional_info')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('label')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};