<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientInOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_in_outs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('patient_id')->unsigned();
            $table->integer('serial_id')->nullable();
            $table->integer('cons_doctor_id')->unsigned();
            $table->integer('bed_id')->unsigned()->nullable();
            $table->enum('type', [
                'opd',
                'ipd',
            ])->default('opd');
            $table->integer('amount')->nullable();
            $table->dateTime('appointment_date');
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('bp')->nullable();
            $table->string('case_type')->nullable();
            $table->boolean('old_patient')->default(false)->nullable();
            $table->string('casualty')->nullable();
            $table->string('symptoms')->nullable();
            $table->string('refference')->nullable();
            $table->boolean('discharged')->default(false);
            $table->string('payment_mode')->default('Cash');
            $table->date('discharged_date')->nullable();
            $table->text('note')->nullable();

            $table->softDeletes();
            $table->timestamps();

            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('cons_doctor_id')->references('id')->on('staff')->onDelete('cascade');
            $table->foreign('bed_id')->references('id')->on('beds')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_in_outs');
    }
}
