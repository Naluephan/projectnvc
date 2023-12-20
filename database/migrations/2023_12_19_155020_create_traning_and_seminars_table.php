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
        Schema::create('traning_and_seminars', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("detail");
            $table->string("status")->default('1');
            $table->string("cert");
            $table->string("day_start");
            $table->string("day_end");
            $table->string("month_start");
            $table->string("month_end");
            $table->string("year_start");
            $table->string("year_end");
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
        Schema::dropIfExists('traning_and_seminars');
    }
};
