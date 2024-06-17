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
        Schema::create('employee_paste_card_logs', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id',20)->nullable();
            $table->integer('department_id');
            $table->dateTime('paste_date');
            $table->tinyInteger('status');
            $table->integer('month');
            $table->integer('days');
            $table->integer('year');
            $table->string('image_capture')->nullable();
            // $table->timestamps();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
