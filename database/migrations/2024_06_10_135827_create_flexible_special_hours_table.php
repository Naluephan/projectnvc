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
        Schema::create('flexible_special_hours', function (Blueprint $table) {
            $table->id();
            $table->string('num_time');
            $table->string('flexible_hours_log_lines_id');
            $table->date('action_date_start');
            $table->date('action_date_end');
            $table->string('description');
            $table->string('duration')->comment('1=am , 2=pm');
            $table->string('work_time_type')->comment('start , end');
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
        Schema::dropIfExists('flexible_special_hours');
    }
};
