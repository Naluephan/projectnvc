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
        Schema::create('transaction_histories', function (Blueprint $table) {
            $table->id();
            $table->integer("emp_id");
            $table->string("title_name");
            $table->string("detail")->nullable();
            $table->tinyInteger('step_status')->comment('1=send,2=approve,3=not approve,4=success,5=cancel')->default(1);
            $table->date('send_date')->nullable();
            $table->date('approve_date')->nullable();
            $table->date('not_approve_date')->nullable();
            $table->date('success_date')->nullable();
            $table->date('cancel_date')->nullable();
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
        Schema::dropIfExists('transaction_histories');
    }
};
