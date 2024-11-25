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
        Schema::create('time_in_outs', function (Blueprint $table) {
            $table->id();
            $table->integer('ref')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('Room')->nullable();
            $table->string('category')->nullable();
            $table->string('Date_in')->nullable();
            $table->string('Date_out')->nullable();
            $table->string('Time-in')->nullable();
            $table->string('Time-out')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_in_outs');
    }
};
