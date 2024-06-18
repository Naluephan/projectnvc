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
        Schema::create('hr_contracts', function (Blueprint $table) {
            $table->id();
            $table->string('contract_category_id')->references('id')->on('contracts_categories');
            $table->string('emp_id')->references('id')->on('employees');
            $table->string('contract_details');
            $table->string('images')->default(null);
            $table->integer('transction_requests_id');
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
        Schema::dropIfExists('hr_contracts');
    }
};
