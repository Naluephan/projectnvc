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
        Schema::create('reward_coins', function (Blueprint $table) {
            $table->id();
            $table->string("reward_name")->nullable();
            $table->string("reward_image")->nullable();
            $table->string("reward_description")->nullable();
            $table->integer("reward_coins_change")->nullable();
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
        Schema::dropIfExists('reward_coins');
    }
};
