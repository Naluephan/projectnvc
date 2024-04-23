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
        Schema::create('group_insurances', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('group_insurance_img');
            $table->string('position_id');
            $table->string('company_id');
            $table->string('department_id');
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
        Schema::dropIfExists('group_insurances');
    }
};
