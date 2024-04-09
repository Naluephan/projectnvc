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
        Schema::create('report_repairs', function (Blueprint $table) {
            $table->id();
            $table->string('repair_id');
            $table->string('repair_type');
            $table->string('repair_equipment');
            $table->string('repair_detail');
            $table->string('images')->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('report_repairs');
    }
};
