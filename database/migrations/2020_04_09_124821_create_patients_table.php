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
            $table->increments('id');
            $table->integer('unique_id')->nullable();
            $table->string('admission_date')->nullable();
            $table->string('name');
            $table->string('age')->nullable();
            $table->string('month')->nullable();
            $table->string('image')->nullable();
            $table->string('mobileno')->nullable();
            $table->string('email')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender');
            $table->string('marital_status')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('address')->nullable();
            $table->string('guardian_name')->nullable();
            $table->string('guardian_phone')->nullable();
            $table->string('guardian_address')->nullable();
            $table->string('guardian_email')->nullable();
            $table->boolean('is_active')->default(true);
            $table->string('discharged')->nullable();
            $table->string('patient_type')->nullable();
            $table->integer('credit_limit')->nullable();
            $table->boolean('old_patient')->default(false);
            $table->text('note')->nullable();

            $table->softDeletes();
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
