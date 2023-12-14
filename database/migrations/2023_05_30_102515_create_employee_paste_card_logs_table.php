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
        Schema::create('employee_paste_card_logs', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id',20)->nullable();
            $table->dateTime('paste_date');
            $table->string('status');
            $table->integer('year');
            $table->integer('month');
            $table->integer('days');
            $table->string('image_capture')->nullable();
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
        Schema::dropIfExists('employee_paste_card_logs');
    }
};
