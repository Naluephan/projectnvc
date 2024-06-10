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
        Schema::create('history_transaction_rewards', function (Blueprint $table) {
            $table->id();
            $table->integer("emp_id");
            $table->tinyInteger('type')->comment('1=automatic 2=request')->default(1);
            $table->tinyInteger("status_transaction")->comment('0=pending 1=edit 2=approved 3=cancel 4=reject 5=success')->default(0);
            $table->integer("reward_id");
            $table->integer("activity_id");
            $table->tinyInteger('day');
            $table->tinyInteger('month');
            $table->smallInteger('year');

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
        Schema::dropIfExists('history_transaction_rewards');
    }
};
