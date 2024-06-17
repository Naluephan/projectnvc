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
        Schema::create('building_locations', function (Blueprint $table) {
            $table->id();
            $table->string('location_name');
            $table->string('location_img')->nullable();
            $table->integer('total_floors');
            $table->integer('total_rooms');
            $table->tinyInteger('record_status')->comment('0=not active 1=active 2=complate')->default(1);
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
        Schema::dropIfExists('building_locations');
    }
};
