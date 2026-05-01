<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cleaning_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings')->cascadeOnDelete();
            $table->foreignId('cleaner_id')->constrained('users')->cascadeOnDelete();
            $table->text('initial_condition'); 
            $table->text('cleaning_action'); 
            $table->string('time_estimate');
            $table->date('process_date');
            $table->date('completion_date')->nullable();
            $table->integer('service_cost');
            $table->integer('additional_cost')->default(0);
            $table->integer('total_cost');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cleaning_reports');
    }
};