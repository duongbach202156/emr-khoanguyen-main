<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id')->unique();

            $table->string('title')->nullable();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('identity_number')->unique();
            $table->string('phone_patient');
            $table->string('occupation')->nullable()->comment('Nghề nghiệp');
            $table->string('sex')->nullable();
            $table->date('dob')->nullable();
            $table->string('nationality')->nullable()->comment('Quốc tịch');
            $table->integer('ethnic_id')->nullable()->comment('Dân tộc');
            $table->string('religion')->nullable()->comment('Tôn giáo');
            $table->integer('city_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->integer('ward_id')->nullable();
            $table->string('home_address')->nullable();
            $table->string('marital_status')->nullable()->comment('Tình trạng hôn nhân');
            $table->string('name_next_of_kin')->nullable()->comment('Tên người thân');
            $table->string('home_next_of_kin')->nullable()->comment('Địa chỉ người thân');
            $table->string('phone_next_of_kin')->nullable()->comment('SĐT người thân');
            $table->string('type_of_object')->nullable()->comment('Loại đối tượng');
            $table->string('health_insurance_id')->nullable()->comment('Số thẻ BHYT');
            $table->date('health_insurance_date')->nullable()->comment('BHYT có giá trị đến ngày');

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
        Schema::dropIfExists('patients');
    }
}
