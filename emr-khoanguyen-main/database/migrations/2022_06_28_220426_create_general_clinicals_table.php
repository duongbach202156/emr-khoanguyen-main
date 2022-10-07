<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralClinicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_clinicals', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->string('time')->default(1)->comment('lần thứ');
            $table->string('diagnosis_tuanhoan')->nullable()->comment('chẩn đoán hệ tuần hoàn');
            $table->string('diagnosis_hohap')->nullable()->comment('chẩn đoán hệ hô hấp');
            $table->string('diagnosis_tieuhoa')->nullable()->comment('chẩn đoán hệ tiêu hóa');
            $table->string('diagnosis_than_tietnieu_sinhduc')->nullable()->comment('chẩn đoán hệ tiết niệu sinh duc');
            $table->string('diagnosis_thankinh')->nullable()->comment('chẩn đoán hệ thần kinh');
            $table->string('diagnosis_coxuongkhop')->nullable()->comment('chẩn đoán hệ cơ xương khớp');
            $table->string('diagnosis_taimuihong')->nullable()->comment('chẩn đoán tai mũi họng');
            $table->string('diagnosis_ranghammat')->nullable()->comment('chẩn đoán răng hàm mặt');
            $table->string('diagnosis_mat')->nullable()->comment('chẩn đoán mắt');
            $table->string('diagnosis_noitiet_dinhduong_khac')->nullable()->comment('chẩn đoán khác');
            $table->string('diagnosis_syndrome')->nullable()->comment('hội chứng');
            $table->string('name_subclinical_service')->nullable()->comment('dịch vụ cận lâm sàng');
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
        Schema::dropIfExists('general_clinicals');
    }
}
