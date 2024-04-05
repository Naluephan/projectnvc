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
        Schema::create('social_securities', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('social_security_type_id');
            $table->string('child_certificate')->nullable();
            $table->string('saving_passbook')->nullable();
            $table->string('marriage_certificate')->nullable();
            $table->string('record_status')->default(1);
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
        Schema::dropIfExists('social_securities');
    }
};
