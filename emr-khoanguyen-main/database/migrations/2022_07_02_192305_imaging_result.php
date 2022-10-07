<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImagingResult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imaging_result', function (Blueprint $table) {
            $table->id();
            $table->string('patient_id');
            $table->string('name')->comment('Tên dịch vụ');
            $table->string('url')->comment('đường dẫn ảnh kết quả');
            $table->string('comment')->comment('Nhận xét kết quả');
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
        Schema::dropIfExists('imaging_result');
    }
}
