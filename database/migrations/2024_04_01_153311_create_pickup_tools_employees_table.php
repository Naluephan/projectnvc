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
        Schema::create('pickup_tools_employees', function (Blueprint $table) {
            $table->id();
            $table->integer("emp_id")->nullable();
            $table->integer("company_id")->nullable();
            $table->integer("department_id")->nullable();
            $table->integer("pickup_tools_id")->nullable();
            $table->integer("number_requested")->nullable();
            $table->tinyInteger('status_repair')->comment('1=succeed 2=normal 3=repair')->default(2);
            $table->tinyInteger('status_approved')->comment('0=pending 1=edit 2=approve 3=cancel 4=reject')->default(0);
            $table->string('request_details')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('approve_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('cancel_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('reject_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pickup_tools_employees');
    }
};
