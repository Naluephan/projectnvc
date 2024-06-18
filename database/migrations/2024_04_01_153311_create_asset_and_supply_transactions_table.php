<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_asset_and_supply_transactions', function (Blueprint $table) {
            $table->id();
            $table->integer("emp_id")->nullable();
            $table->integer("company_id")->nullable();
            $table->integer("department_id")->nullable();
            $table->integer("amount")->nullable();
            // $table->integer("number_requested")->nullable();
            $table->integer("assets_and_supply_id")->nullable();
            // $table->tinyInteger("status")->comment('1=approved 2=cancel 3=reject');
            $table->string('details');
            $table->string('actions');
            $table->integer('transaction_requests_id');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hr_asset_and_supply_transactions');
    }
};
