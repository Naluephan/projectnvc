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
        Schema::create('c_status_logs', function (Blueprint $table) {
            $table->id();
            $table->string('note');
            $table->tinyInteger('status_log')->comment('0=pending 1=approved 2=cancel 3=reject')->default(0);
            $table->integer('module_id');
            $table->string('module_name');
            $table->string('module_code');
            $table->integer('emp_id');

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
        Schema::dropIfExists('c_status_logs');
    }
};
