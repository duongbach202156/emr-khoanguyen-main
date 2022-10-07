<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHospitalHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_histories', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->integer('time')->default(1)->comment('Vào viện lần thứ mấy');
            $table->dateTime('date_attented')->nullable()->comment('Thời gian đến');
            $table->dateTime('date_admitted')->nullable()->comment('Thời gian tiếp nhận');
            $table->string('admit_dept')->nullable()->comment('Khoa tiếp nhận');
            $table->string('refer_dept')->nullable()->comment('Nơi giới thiệu');
            $table->string('symptoms')->nullable()->comment('Triệu chứng');
            $table->string('reason')->nullable()->comment('Lý do vào viện');
            $table->integer('reason_date')->nullable()->comment('Số ngày biểu hiện');
            $table->string('disease_self')->nullable()->comment('Tiền sử bệnh của bệnh nhân');
            $table->string('disease_family')->nullable()->comment('Tiền sử bệnh của gia đình');
            $table->integer('disease_relateto_relateto_diung')->default(0)->comment('Bệnh dị ứng');
            $table->integer('disease_relateto_diung_time')->nullable()->comment('Thời gian bị dị ứng');
            $table->integer('disease_relateto_matuy')->default(0)->comment('Có sử dụng ma túy');
            $table->integer('disease_relateto_matuy_time')->nullable()->comment('Thời gian sử dụng ma túy');
            $table->integer('disease_relateto_ruoubia')->default(0)->comment('Có sử dụng rượu bia');
            $table->integer('disease_relateto_ruoubia_time')->nullable()->comment('Thời gian sử dụng rượu bia');
            $table->integer('disease_relateto_thuocla')->default(0)->comment('Có hút thuốc lá');
            $table->integer('disease_relateto_thuocla_time')->nullable()->comment('Thời gian sử dụng thuốc lá');
            $table->integer('disease_relateto_khac')->default(0)->comment('Các vấn đề khác');
            $table->integer('disease_relateto_khac_time')->nullable()->comment('Thời gian sử dụng');
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
        Schema::dropIfExists('hospital_histories');
    }
}
