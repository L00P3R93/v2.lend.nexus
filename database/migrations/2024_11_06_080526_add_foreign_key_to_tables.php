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
        Schema::table('customers', function (Blueprint $table) {
            $table->foreign('town_id')->references('id')->on('towns')->onDelete('set null');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('set null');
            $table->foreign('branch_id')->references('id')->on('bank_branches')->onDelete('set null');
        });

        Schema::table('towns', function (Blueprint $table) {
            $table->foreign('county_id')->references('id')->on('county')->onDelete('set null');
        });

        Schema::table('bank_branches', function (Blueprint $table) {
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('set null');
            $table->foreign('town_id')->references('id')->on('towns')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            //
        });
    }
};
