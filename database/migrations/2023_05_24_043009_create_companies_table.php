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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name_th')->uniqid();
            $table->string('name_en')->uniqid();
            $table->string('short_name')->uniqid();
            $table->string('address_th');
            $table->string('address_en');
            $table->string('contact_number');
            $table->string('website');
            $table->string('email');
            $table->string('logo');
            $table->string('order_prefix')->uniqid();
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
        Schema::dropIfExists('companies');
    }
};
