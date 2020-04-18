<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sort_code')->nullable();
            $table->string('name');
            $table->integer('charge');
            $table->string('short_name')->nullable();
            $table->string('test_type')->nullable();
            $table->string('test_category')->nullable();
            $table->string('unit')->default(1);
            $table->string('report_days')->nullable();
            $table->string('method')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_tests');
    }
}
