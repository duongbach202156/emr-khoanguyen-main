<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BloodResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_results', function (Blueprint $table) {
            $table->id();
            $table->integer('lab_result_id')->comment('ID kết quả từ bảng LabResult');
            $table->float('glu', 4, 1, true)->comment('Đường trong máu');
            $table->float('ure', 4, 1, true)->comment('ure máu');
            $table->float('rbc', 4, 1, true)->comment('Số lượng hồng cầu');
            $table->float('hb', 4, 1, true)->comment('Lượng huyết sắc tố');
            $table->float('hct', 4, 1, true)->comment('Khối hồng cầu');
            $table->float('mcv', 4, 1, true)->comment('Thể tích trung bình của hồng cầu');
            $table->float('mch', 4, 1, true)->comment('Lượng Hb trung bình hồng cầu');
            $table->float('wbc', 4, 1, true)->comment('Số lượng bạch cầu trong một thể tích máu');
            $table->float('neut', 4, 1, true)->comment('Bạch cầu trung tính');
            $table->float('lym', 4, 1, true)->comment('Bạch cầu Lympho');
            $table->float('mono', 4, 1, true)->comment('Bạch cầu mono');
            $table->float('plt', 4, 1, true)->comment('Số lượng tiểu cầu trong một thể tích máu');
            $table->string('blood_group')->comment('Nhóm máu');
            $table->string('blood_type')->comment('Loại máu');
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
        Schema::dropIfExists('blood_results');
    }
}
