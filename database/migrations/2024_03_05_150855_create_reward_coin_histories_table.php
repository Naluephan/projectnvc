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
        Schema::create('reward_coin_histories', function (Blueprint $table) {
            $table->id();
            $table->integer("emp_id")->nullable();
            $table->tinyInteger('type_reward')->comment('0=not active 1=automatic 2=request')->default(1);
            $table->string("reward_name")->nullable();
            $table->string("reward_image")->nullable();
            $table->integer("reward_coins_change")->nullable();

            $table->tinyInteger('record_status')->comment('0=not active 1=active 2=complate 3=pending 4=cancel')->default(3);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('approve_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('not_approved_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('cancel_at')->default(DB::raw('CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('reward_coin_histories');
    }
};
