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
        Schema::create('contracts_changes', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->references('id')->on('employees');
            $table->string('con_type_name')->references('id')->on('contracts_categories');
            $table->string('change_details');
            $table->string('images');
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
        Schema::dropIfExists('contracts_changes');
    }
};
