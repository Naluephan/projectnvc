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
        Schema::create('income_transactions', function (Blueprint $table) {
            $table->id();
            $table->text('note');
            $table->integer('income_type_id');
            $table->string('amount_value');
            $table->integer('status_active');
            $table->integer('salary_transactions_id');
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
        Schema::dropIfExists('income_transactions');
    }
};
