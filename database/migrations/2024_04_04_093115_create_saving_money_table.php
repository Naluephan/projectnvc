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
        Schema::create('saving_money', function (Blueprint $table) {
            $table->id();
            $table->integer("emp_id");
            $table->tinyInteger('save_status')->comment('1=ฝาก, 2=ถอน')->default(1);
            $table->decimal('amount',11,2);
            $table->decimal('total_amount',11,2);
            $table->integer('month');
            $table->integer('year');
            $table->dateTime('save_date')->nullable()->default(null);
            $table->tinyInteger('save_channel')->default(1);
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
        Schema::dropIfExists('saving_money');
    }
};
