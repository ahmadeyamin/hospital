<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('patient_id')->unsigned()->nullable();
            $table->integer('billable_id');
            $table->string('billable_type');

            $table->integer('discount')->default(0);
            $table->integer('extra_charge')->default(0);
            $table->date('date');
            $table->integer('tax')->default(0);
            $table->integer('generated_by')->unsigned()->nullable();
            $table->enum('status',[
                'approved',
                'pending',
                'request'
            ])->default('approved');

            $table->softDeletes();
            $table->timestamps();



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
        Schema::dropIfExists('bills');
    }
}
