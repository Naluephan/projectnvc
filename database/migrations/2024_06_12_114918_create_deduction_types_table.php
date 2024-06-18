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
        Schema::create('hr_deduction_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->tinyInteger('type')->comment('type 1 = หักเปล่า ไม่ได้คืนจากบริษัท, 2 = หักเพื่อออม ได้คืนจากบริษัท , 3 = หักเมื่อครบสัญญาจะได้คืน , 4 = หักเพื่อใช้หนี้');
            $table->tinyInteger('priority');
            $table->tinyInteger('status');
            $table->tinyInteger('add_auto_status')->comment('1 = โอนเงินเข้าอัตโนมัติ (กำหนด amout_auto ด้วย เพื่อกำหนดว่าเป็นจำนวนเงินเข้าทุกเดือนเท่าไหร่),2 = ไม่โอนเงินเข้าอัตโนมัติ');
            $table->string('amount_auto');
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
        Schema::dropIfExists('hr_deduction_types');
    }
};
