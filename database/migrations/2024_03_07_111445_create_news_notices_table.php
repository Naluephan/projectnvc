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
            $table->string("news_notice_name")->nullable();
            $table->string("news_notice_description")->nullable();
            $table->integer("notice_category_id")->nullable();
            $table->tinyInteger('news_priority')->comment('1=important 2=general')->default(2);
            $table->tinyInteger('read_or_not')->comment('0=not 1=read')->default(0);

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
