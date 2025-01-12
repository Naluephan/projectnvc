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
        Schema::create('hr_deduction_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('note');
            $table->integer('deduction_types_id');
            $table->string('amount_value');
            $table->string('status_active');
            $table->integer('salary_transactions_id');
            $table->integer('module_id');
            $table->string('module_name');
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
        Schema::dropIfExists('hr_deduction_transactions');
    }
};
