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
        Schema::create('withdraw_reverse_funds', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('reserse_fund_id');
            $table->string('reserse_fund_detail');
            $table->string('withdraw_balance');
            $table->integer('reserve_request')->comment('0=รอดำเนินการ , 1=ดำเนินการเรียบร้อย')->default(0);
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
        Schema::dropIfExists('withdraw_reverse_funds');
    }
};
