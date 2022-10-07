<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCreatorIdCollumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table){
            $table->integer('creator_id')->nullable()->comment('ID người cập nhật');
        });
        Schema::table('diagnoses', function (Blueprint $table){
            $table->integer('creator_id')->nullable()->comment('ID người cập nhật');
        });
        Schema::table('general_clinicals', function (Blueprint $table){
            $table->integer('creator_id')->nullable()->comment('ID người cập nhật');
        });
        Schema::table('hospital_histories', function (Blueprint $table){
            $table->integer('creator_id')->nullable()->comment('ID người cập nhật');
        });
        Schema::table('imaging_result', function (Blueprint $table){
            $table->integer('creator_id')->nullable()->comment('ID người cập nhật');
        });
        Schema::table('lab_result', function (Blueprint $table){
            $table->integer('creator_id')->nullable()->comment('ID người cập nhật');
        });
        Schema::table('subclinical_service', function (Blueprint $table){
            $table->integer('creator_id')->nullable()->comment('ID người cập nhật');
        });
        Schema::table('vitals', function (Blueprint $table){
            $table->integer('creator_id')->nullable()->comment('ID người cập nhật');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
