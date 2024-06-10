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
        Schema::create('flexible_hours_log_lines', function (Blueprint $table) {
            $table->id();
            $table->time('am_worktime_start');
            $table->time('am_worktime_end');
            $table->time('pm_worktime_start');
            $table->time('pm_worktime_end');
            $table->time('start_late_am');
            $table->time('end_late_pm');
            $table->string('description');
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
        Schema::dropIfExists('flexible_hours_log_lines');
    }
};
