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
        Schema::create('tas_employees', function (Blueprint $table) {
            $table->id();
            $table->string("emp_id");
            $table->string("tas_id");
            $table->string("participate_status")->default(0);
            $table->string("cert_status")->default(0);
            $table->string("remark1")->nullable();
            $table->string("remark2")->nullable();
            $table->string("remark3")->nullable();
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
        Schema::dropIfExists('tas_employees');
    }
};
