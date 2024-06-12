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
        Schema::create('saving_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer("emp_id");
            $table->tinyInteger('status')->comment('1=ฝาก, 2=ถอน')->default(1);
            $table->decimal('amount',11,2);
            // $table->decimal('total_amount',11,2);
            $table->integer('month');
            $table->integer('year');
            // $table->dateTime('save_date')->nullable()->default(null);
            $table->tinyInteger('channel')->default(1);
            $table->string('withdrawResult');
            $table->integer('fund_informations_id');
            // $table->tinyInteger('approve_status')->comment('1=ขอถอน, 2=อนุมัติ , 3=ไม่อนุมัติ')->default(1);
            $table->string("remark")->nullable();
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
        Schema::dropIfExists('saving_transactions');
        // Schema::dropIfExists('saving_money');
    }
};
