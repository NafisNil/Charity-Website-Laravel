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
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->longtext('description')->nullable();
            $table->string('status')->default('active'); // e.g., active, paused
            $table->date('date')->nullable();
           $table->string('photo')->nullable(); // URL or path to the campaign photo

           $table->string('currency')->default('USD'); // Default currency
           $table->decimal('amount_raised', 10, 2)->default(0.00); // Amount raised so far
           $table->decimal('goal_amount', 10, 2)->default(0.00); // Goal amount for the campaign
          
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};
