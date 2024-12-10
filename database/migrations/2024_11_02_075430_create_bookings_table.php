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
        Schema::create('bookingss', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('designer_id');
            $table->integer('time_id');
            $table->string('b_name');
            $table->string('email'); 
            $table->string('phone')->unique();  
            $table->tinyInteger('status')->default('0');
            $table->date('b_date');
            $table->string('special_requests')->nullable();  // Made optional
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
