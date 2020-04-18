<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientChargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_charges', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('patient_id')->unsigned()->nullable();
            $table->integer('bill_id')->unsigned()->nullable();
            
            $table->integer('referencer_id')->unsigned()->nullable();
            $table->integer('referencer_amount')->default(0);

            $table->enum('reference_type',[
                'p',
                'm'
            ])->nullable();

            $table->integer('chargeable_id');
            $table->string('chargeable_type');


            $table->integer('apply_charge');

            $table->date('date');

            $table->timestamps();
            $table->softDeletes();


            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patient_charges');
    }
}
