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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('cus_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('reserve_for')->nullable();
            $table->string('category')->nullable();
            $table->integer('personCount')->nullable();
            $table->string('time')->nullable();
            $table->string('price')->nullable();
            $table->string('entrance_fee')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('down_payment')->nullable();
            $table->string('rem_balance')->nullable();
            $table->string('gcash_ref')->nullable();
            $table->string('check_in')->nullable();
            $table->string('check_out')->nullable();
            $table->string('status')->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
