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
            $table->integer('emp_id');
            $table->string('social_security_type_id');
            $table->string('social_security_type_name');
            $table->integer('company_id');
            $table->integer('position_id');
            $table->integer('department_id');
            $table->string('approve_status')->comment('0=create/pending ,1=edit, 2=approve , 3=cancel , 4=reject')->default(0);
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
