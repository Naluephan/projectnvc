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
            // $table->string('location_id');
            $table->string('location_name');
            $table->string('location_img')->nullable();
            $table->string('total_floors');
            $table->string('total_rooms');
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
        Schema::dropIfExists('building_locations');
    }
};
