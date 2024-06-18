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
        Schema::create('hr_store_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('emp_id');
            $table->text('department_id');
            $table->integer('amount');
            $table->integer('store_id');
            $table->integer('module_id');
            $table->text('module_name');
            $table->integer('item_id');
            $table->text('item_name');
            $table->integer('to_emp_id');
            $table->integer('to_store_id');
            $table->integer('action');
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
        Schema::dropIfExists('hr_store_transactions');
    }
};
