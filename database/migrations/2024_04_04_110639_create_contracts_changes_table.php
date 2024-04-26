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
            $table->integer('emp_id')->references('id')->on('employees');
            $table->string('contract_category_id')->references('id')->on('contracts_categories');
            $table->string('change_details');
            $table->integer('contract_status')->default(0)->comment('0 = pending, 1 = edit, 2 = approved, 3 = cancel, 4 = reject');
            $table->string('images')->nullable();
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
