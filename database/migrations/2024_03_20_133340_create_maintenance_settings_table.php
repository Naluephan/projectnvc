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
        Schema::create('hr_maintenance_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('locations_id');
            $table->integer('maintenance_patrol')->default(0);
            $table->time('maintenance_time');
            $table->string('maintenance_img');
            $table->string('qr_code');
            $table->integer('user_id');
            $table->tinyInteger('record_status')->default(1);
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
        Schema::dropIfExists('hr_maintenance_settings');
    }
};
