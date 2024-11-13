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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->string('customer_phone', 30);
            $table->date('given_date');
            $table->date('due_date');
            $table->double('loan_amount', 10, 2);
            $table->double('loan_interest', 10, 2);
            $table->double('processing_fee', 10, 2);
            $table->double('loan_total', 10, 2);
            $table->double('late_penalty', 10, 2);
            $table->integer('loan_penalty_freq');
            $table->double('bounce_cheque', 10, 2);
            $table->double('recovery_fee', 10, 2);
            $table->double('penalty_total', 10, 2);
            $table->double('initial_pen_total', 10, 2);
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->integer('loan_period');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->mediumText('comments');
            $table->unsignedBigInteger('status')->nullable();
            $table->integer('section')->default(1);
            $table->integer('top_up')->default(0);
            $table->integer('roll_state')->default(0);
            $table->integer('roll_state_ok')->default(0);
            $table->integer('roll_over')->default(0);
            $table->integer('new_loan')->default(0);
            $table->integer('old_loan')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
