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
        Schema::create('hr_security_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('locations_id');
            $table->integer('security_patrol')->default(0);
            $table->time('security_time')->default(0);
            $table->string('security_img');
            $table->tinyInteger('record_status')->comment('0=not active 1=active 2=complate')->default(1);
            $table->tinyInteger('user_id');
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
        Schema::dropIfExists('hr_security_settings');
    }
};
