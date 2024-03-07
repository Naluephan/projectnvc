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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->integer("newsCate_id");
            $table->integer("announcer_id");
            $table->string("name_news")->nullable();
            $table->string("news_description")->nullable();
            $table->string('news_img1')->nullable();
            $table->string('news_img2')->nullable();
            $table->string('news_img3')->nullable();

            $table->tinyInteger('record_status')->comment('0=not active 1=active 2=complate')->default(1);
            $table->date('published_at')->nullable();
            $table->date('cancelled_at')->nullable();

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('news');
    }
};
