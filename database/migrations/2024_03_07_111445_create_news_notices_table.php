<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_notices', function (Blueprint $table) {
            $table->id();
            $table->integer("notice_category_id")->nullable();
            $table->string("news_notice_name")->nullable();
            $table->string("news_notice_description")->nullable();
            $table->tinyInteger('news_priority')->comment('1=important 2=general')->default(2);
            $table->string('news_img1')->default('-');
            $table->string('news_img2')->default('-');
            $table->string('news_img3')->default('-');
            $table->date('published_at')->nullable();
            $table->date('cancelled_at')->nullable();

            $table->tinyInteger('record_status')->comment('0=not active 1=active 2=complate')->default(1);
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
        Schema::dropIfExists('news_notices');
    }
};
