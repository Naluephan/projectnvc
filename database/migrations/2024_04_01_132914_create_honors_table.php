<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('honors', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->string('honor_category_id')->default(1);
            // $table->string('honor_category_type_id')->nullable();
            $table->string('honor_img')->nullable();
            $table->string('honor_detail')->nullable();
            $table->string('record_status')->default(1);
            $table->timestamps();
        });
        // DB::statement("ALTER TABLE honors MODIFY honor_category_type_id INT NULL DEFAULT NULL AFTER honor_category_id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('honors');
    }
};
