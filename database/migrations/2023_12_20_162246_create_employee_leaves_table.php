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
        Schema::create('employee_leaves', function (Blueprint $table) {
            $table->id();
            $table->integer('emp_id')->nullable();
            $table->integer('leave_type_id')->nullable()->comment('ลาป่วย=1, ลากิจ=2, ลาพักร้อน=3, ลาคลอด=4, ลาปฏิบัติหน้าที่เกณฑ์ทหาร=5, ลาบวช=6');
            $table->string('leave_type_title')->nullable();
            $table->integer('status_manager_approve')->nullable();
            $table->integer('status_hr__approve')->nullable();
            $table->string('leave_detail')->nullable();
            $table->string('leave_img1')->nullable();
            $table->string('leave_img2')->nullable();
            $table->string('leave_img3')->nullable();
            $table->string('leave_img4')->nullable();
            $table->string('leave_img5')->nullable();
            $table->dateTime('leave_date_start')->nullable();
            $table->dateTime('leave_date_end')->nullable();
            $table->integer('sum_hours')->nullable();
            $table->integer('month')->nullable();
            $table->integer('year')->nullable();
            $table->integer('days')->nullable();
            $table->integer('leave_day')->nullable();
            $table->integer('leave_hours')->nullable();
            // $table->timestamps();
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
        Schema::dropIfExists('employee_leaves');
    }
};


