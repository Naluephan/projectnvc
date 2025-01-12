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
        Schema::create('worktimes', function (Blueprint $table) {
            $table->id();
            $table->string('department_id');
            $table->string('worktime_day1')->nullable();
            $table->string('worktime_day2')->nullable();
            $table->string('worktime_day3')->nullable();
            $table->string('worktime_day4')->nullable();
            $table->string('worktime_day5')->nullable();
            $table->string('worktime_day6')->nullable();
            $table->string('worktime_day7')->nullable();
            $table->string('flexible_hours_log_lines_id');
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
        Schema::dropIfExists('worktimes');
    }
};
