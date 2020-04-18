<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_reports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('test_id')->unsigned();
            $table->integer('reference_id')->nullable()->unsigned();
            $table->integer('reference_amount')->default(0);
            $table->integer('consultant_doctor')->nullable()->unsigned();
            $table->decimal('amount',15,2);
            $table->date('reporting_date')->nullable();
            $table->string('desc')->nullable();
            $table->text('report_data')->nullable();
            $table->timestamps();
            $table->softDeletes();


            
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('test_id')->references('id')->on('lab_tests')->onDelete('cascade');
            $table->foreign('reference_id')->references('id')->on('staff')->onDelete('cascade');
            $table->foreign('consultant_doctor')->references('id')->on('staff')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_reports');
    }
}
