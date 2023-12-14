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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->integer('position_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->string('employee_card_id',20)->nullable();
            $table->string('employee_code', 20);
            $table->string('pre_name', 20);
            $table->string('f_name', 100);
            $table->string('l_name', 100);
            $table->string('n_name', 10);
            $table->string('gender_id');
            $table->date('birthday');
            $table->string('mobile', 50);
            $table->string('card_add', 255);
            $table->string('current_add', 255);
            $table->string('id_card', 20);
            $table->date('start_date');
            $table->string('end_date', 50)->nullable();
            $table->integer('y_experience')->nullable();
            $table->string('image',255)->nullable();
            $table->tinyInteger('record_status')->default(1);
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
        Schema::dropIfExists('employees');
    }
};
