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
        Schema::create('hr_honors', function (Blueprint $table) {
            $table->id();
            $table->integer('emp_id');
            $table->integer('honor_category_id')->default(1);
            $table->integer('company_id');
            $table->integer('position_id');
            $table->integer('department_id');
            $table->string('honor_img')->nullable();
            $table->string('honor_detail')->nullable();
            $table->integer('transaction_requests_id');
            $table->tinyInteger('status_active')->comment('0 = not active 1 = active')->default(1);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('hr_honors');
    }
};
