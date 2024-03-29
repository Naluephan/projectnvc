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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->string('first_name');
            $table->string('mid_name')->nullable();
            $table->string('last_name');
            $table->string('nick_name');
            $table->string('cm_code')->nullable();
            $table->tinyInteger('active')->default(1);
            $table->tinyInteger('record_status')->default(1);
            $table->tinyInteger('online_status')->default(0)->comment('0=office, 1=online');
            $table->integer('title_id');
            $table->integer('company_id');
            $table->integer('role_id');
            $table->string('user_code')->nullable();
            $table->string('user_profile')->nullable();
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
        Schema::dropIfExists('users');
    }
};
