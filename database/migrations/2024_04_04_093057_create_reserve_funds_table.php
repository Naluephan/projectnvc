<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserve_funds', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('reserve_fund_number');
            $table->string('saving_rate');
            $table->string('day');
            $table->string('month');
            $table->string('year');
            $table->string('company_id');
            $table->string('position_id');
            $table->string('department_id');
            // $table->string('date');
            $table->string('reserve');
            $table->string('contribution');
            $table->string('total_month');
            $table->string('accumulate_balance');
            $table->string('record_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserve_funds');
    }
};
