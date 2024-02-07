<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('employee_leave_quotas', function (Blueprint $table) {
            $table->id();
            // $table->integer('emp_id')->nullable();
            $table->integer('leave_type_id')->nullable()->comment('ลาป่วย=1, ลากิจ=2, ลาพักร้อน=3, ลาคลอด=4, มาสาย=5, ลาอื่นๆ=6');
            $table->string('quota')->nullable();
            $table->integer('year_quota')->nullable();

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
        Schema::dropIfExists('employee_leave_quotas');
    }
};
