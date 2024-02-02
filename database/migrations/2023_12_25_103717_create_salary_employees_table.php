p<?php

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
        Schema::create('salary_employees', function (Blueprint $table) {
            $table->id();
            $table->string("emp_id");
            $table->string("salary");
            $table->string("diligence_allowance");
            $table->string("overtime");
            $table->string("fuel_cost");
            $table->string("bonus");
            $table->string("interest");
            $table->string("commission");
            $table->string("get_orthers");
            $table->string("total_earning");
            $table->string("social_security_fund");
            $table->string("withholding_tax");
            $table->string("deposit");
            $table->string("absent_leave_late");
            $table->string("company_loan");
            $table->string("deposit_fund");
            $table->string("deduc_others");
            $table->string("total_deductions");
            $table->string("net_pay");
            $table->string("day");
            $table->string("month");
            $table->string("year");
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
        Schema::dropIfExists('salary_employees');
    }
};
