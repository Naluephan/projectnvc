<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('salary_request_slips', function (Blueprint $table) {
            $table->id();
            $table->integer("emp_id");
            $table->string("month_request")->nullable();
            $table->string("reason_request")->nullable();
            $table->integer("request_approve")->default(0);
            $table->date('use_date')->nullable();
            $table->tinyInteger('record_status')->comment('0=not active 1=active 2=complate')->default(1);
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
        Schema::dropIfExists('salary_request_slips');
    }
};
