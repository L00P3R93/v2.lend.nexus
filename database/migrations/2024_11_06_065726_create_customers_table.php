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
            $table->string('first_name', 50);
            $table->string('last_name', 50);
            $table->string('other_name', 50)->nullable();
            $table->string('idNo', 30)->unique()->nullable();
            $table->string('primaryPhone', 30)->unique();
            $table->string('secondaryPhone', 100)->nullable();
            $table->string('work_email', 100)->unique()->nullable();
            $table->string('personal_email', 100)->unique()->nullable();
            $table->date('dob');
            $table->integer('gender')->default(1);
            $table->mediumText('business_address')->nullable();
            $table->mediumText('home_address')->nullable();
            $table->integer('section')->default(1);
            $table->integer('job_type')->default(1);
            $table->double('loan_limit', 10,2)->default(0);
            $table->integer('has_loan')->default(0);
            $table->unsignedBigInteger('town_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->unsignedBigInteger('bank_id')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->unsignedBigInteger('status')->nullable();
            $table->mediumText('comments')->nullable();
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
