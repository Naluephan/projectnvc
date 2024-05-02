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
        Schema::create('report_repairs', function (Blueprint $table) {
            $table->id();
            $table->string('categories_id')->references('id')->on('report_repair_categories');
            $table->string('emp_id')->references('id')->on('employees');
            $table->string('equipment_name');
            $table->string('repair_detail');
            $table->string('images')->nullable();
            $table->integer('report_status')->default(0)->comment('0 = pending, 1 = edit, 2 = approved, 3 = cancel, 4 = reject, 5 = success');
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
        Schema::dropIfExists('report_repairs');
    }
};
