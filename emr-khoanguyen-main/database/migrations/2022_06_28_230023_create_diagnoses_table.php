<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnoses', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->string('icd10_main_code')->nullable()->comment('Mã bệnh chính');
            $table->string('icd10_sub_code')->nullable()->comment('Mã bệnh phụ');
            $table->string('diagnosis')->nullable()->comment('Chẩn đoán');
            $table->string('disease_prognosis')->nullable()->comment('Tiên lượng');
            $table->string('disease_plan')->nullable()->comment('Hướng điều trị');
            $table->string('result_imaging')->nullable()->comment('kết quả ảnh chụp');
            $table->string('result_lab')->nullable()->comment('Kết quả làm xét nghiệm');
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
        Schema::dropIfExists('diagnoses');
    }
}
