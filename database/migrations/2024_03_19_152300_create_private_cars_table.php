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
        Schema::create('private_cars', function (Blueprint $table) {
            $table->id();
            $table->integer("emp_id");
            $table->integer("company_id");
            $table->integer("department_id");
            $table->tinyInteger('car_category_id')->comment('0=not active 1=car 2=motorcycle')->default(1);
            $table->string("car_registration")->nullable();
            $table->string("car_brand")->nullable();
            $table->string("car_color")->nullable();
            $table->string("car_image")->default(null);

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
        Schema::dropIfExists('private_cars');
    }
};
