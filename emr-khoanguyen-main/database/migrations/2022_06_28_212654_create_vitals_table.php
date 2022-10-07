<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vitals', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->integer('time')->default(1)->comment('lần đo thứ');
            $table->integer('temperature')->nullable()->comment('nhiệt độ bệnh nhân');
            $table->integer('height')->nullable()->comment('chiều cao bệnh nhân');
            $table->integer('weight')->nullable()->comment('cân nặng bệnh nhân');
            $table->integer('pulse')->nullable()->comment('nhịp tim bệnh nhân');
            $table->string('blood_group')->nullable()->comment('nhóm máu');
            $table->string('blood_type')->nullable()->comment('loại máu');
            $table->integer('systolic')->nullable()->comment('huyết áp tâm thu');
            $table->integer('diastolic')->nullable()->comment('huyết áp tâm trương');
            $table->integer('blood_pressure')->nullable()->comment('mạch đập');
            $table->integer('respiration')->nullable()->comment('nhịp thở');
            $table->string('note')->nullable()->comment('ghi chú');
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
        Schema::dropIfExists('vitals');
    }
}
