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
        Schema::create('pickup_tools', function (Blueprint $table) {
            $table->id();
            $table->integer("assets_and_supply_id");
            $table->integer("requested_limit");
            $table->smallInteger('year_condition')->nullable();
            $table->tinyInteger('month_condition')->nullable();
            $table->integer("person_condition")->nullable();
            $table->integer("department_condition")->nullable();
            $table->integer("department_id");

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
        Schema::dropIfExists('pickup_tools');
    }
};
