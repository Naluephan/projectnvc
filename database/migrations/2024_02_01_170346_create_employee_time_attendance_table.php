php artisan make:seeder UserSeeder<?php

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
        Schema::create('employee_time_attendances', function (Blueprint $table) {
            $table->id();
            $table->string("emp_id");
            $table->integer("month");
            $table->integer("year");
            $table->integer("status")->comment('0=medium, 1=normal, 2=late&leave');
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
        Schema::dropIfExists('employee_time_attendances');
    }
};
