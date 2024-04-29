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
        Schema::create('pickup_tools_device_types', function (Blueprint $table) {
            $table->id();
            $table->string("device_types_name")->nullable();
            $table->string("unit")->nullable();
            $table->string("image")->nullable();
            $table->tinyInteger('type_device')->comment('1=temporary 2=permanent 3=all')->default(1);
            $table->string("registration_number")->nullable();

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
        Schema::dropIfExists('pickup_tools_device_types');
    }
};
