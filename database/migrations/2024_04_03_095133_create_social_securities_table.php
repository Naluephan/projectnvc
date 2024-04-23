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
            $table->string('company_id');
            $table->string('position_id');
            $table->string('department_id');
            // $table->string('social_security_type_name');
            $table->string('aprrove_status')->comment('1=รอรับเรื่อง, 2=รับเรื่องแล้ว , 3=ไม่รับเรื่อง , 4=ยกเลิก')->default(1);
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
