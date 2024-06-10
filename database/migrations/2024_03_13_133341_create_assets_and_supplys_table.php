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
        Schema::create('assets_and_supplys', function (Blueprint $table) {
            $table->id();
            $table->string("device_name")->nullable();
            $table->integer("units_id");
            $table->string("file_type")->nullable();
            $table->integer("assets_and_supply_categories_id");
            $table->string("description")->nullable();
            $table->integer("limit_min");
            $table->integer("limit_max");
            $table->integer("status_property");
            $table->integer("cost_price");
            $table->smallInteger('limit_year');
            $table->string("depreciation")->nullable();
            $table->integer("levels_id");
            $table->tinyInteger('month_inspec');
            $table->tinyInteger('start_inspec');
            $table->tinyInteger('department_inspec');

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
        Schema::dropIfExists('assets_and_supplys');
    }
};
