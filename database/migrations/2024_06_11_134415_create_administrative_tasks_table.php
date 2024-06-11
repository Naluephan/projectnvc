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
        Schema::create('administrative_tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('administrative_work_categories_id');
            $table->string('title');
            $table->string('details');
            $table->string('image');
            $table->date('start_date_time');
            $table->date('end_date_time');
            $table->tinyInteger('priority')->comment('1 = Not urgent 2 = express');
            $table->integer('department_id');
            $table->integer('responsible_id');
            $table->integer('assignee_id');
            $table->tinyInteger('status')->comment('0 = not active 1 = active')->default(1);
            $table->integer('upload_file_heads_id');

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('administrative_tasks');
    }
};
