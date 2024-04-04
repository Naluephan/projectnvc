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
        Schema::create('organics_hero_missions', function (Blueprint $table) {
            $table->id();
            $table->integer("mission_type_id");
            $table->integer("mission_category_id")->nullable();
            $table->string("mission_name")->nullable();
            $table->integer("mission_exp");
            $table->string("mission_details")->nullable();
            $table->string("mission_image")->nullable();
            $table->tinyInteger('mission_status')->comment('0=not active 1=active 2=pending')->default(1);

            $table->tinyInteger('record_status')->comment('0=not active 1=active 2=pending')->default(1);
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
        Schema::dropIfExists('organics_hero_missions');
    }
};
