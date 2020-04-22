<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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

            $table->integer('chargeable_id')->nullable();
            $table->string('chargeable_type')->nullable();


            $table->integer('referencer_id')->unsigned()->nullable();
            $table->integer('referencer_amount')->nullable()->default(0);

            $table->enum('reference_type',[
                'p',
                'm'
            ])->nullable();

            $table->integer('apply_charge');
            $table->text('note')->nullable();
            $table->date('date')->default(DB::raw('CURRENT_TIMESTAMP'));

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign('referencer_id')->references('id')->on('staff')->onDelete('cascade');

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
