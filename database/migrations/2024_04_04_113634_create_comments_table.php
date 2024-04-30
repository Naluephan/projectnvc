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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->integer('emp_id')->references('id')->on('employees');
            $table->integer('comment_id')->references('id')->on('comment_topics');
            $table->string('comments_details');
            $table->integer('comments_status')->default(0)->comment('0 = pending, 1 = edit, 2 = approved, 3 = cancel, 4 = reject');
            $table->string('images')->nullable();       
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
        Schema::dropIfExists('comments');
    }
};
