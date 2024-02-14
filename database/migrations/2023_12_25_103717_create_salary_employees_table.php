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
            $table->integer("emp_id");
            $table->integer("salary");
            $table->integer("diligence_allowance");
            $table->integer("overtime");
            $table->integer("fuel_cost");
            $table->integer("bonus");
            $table->integer("interest");
            $table->integer("commission");
            $table->integer("get_orthers");
            $table->integer("total_earning");
            $table->integer("social_security_fund");
            $table->integer("withholding_tax");
            $table->integer("deposit");
            $table->integer("absent_leave_late");
            $table->integer("company_loan");
            $table->integer("deposit_fund");
            $table->integer("deduc_others");
            $table->integer("total_deductions");
            $table->integer("net_pay");
            $table->integer("day");
            $table->integer("month");
            $table->integer("year");
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
