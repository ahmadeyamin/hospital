<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_charges', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('doctor_id')->unsigned();

            $table->integer('standard_charge');


            $table->timestamps();

            $table->softDeletes();

            $table->foreign('doctor_id')->references('id')->on('staff')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_charges');
    }
}
