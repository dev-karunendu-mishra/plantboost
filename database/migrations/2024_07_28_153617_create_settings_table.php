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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->string('domain');
            $table->string('notification')->nullable();
            $table->string('notification_2nd')->nullable();
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->string('branches')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('estimate_order_ready')->nullable();
            $table->string('estimate_order_delivery')->nullable();
            $table->string('theme_color')->nullable();
            $table->string('cod_button_bg')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('logo')->nullable();
            $table->string('icon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
