<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staff_id')->nullable()->unique();
            $table->string('name');
            $table->enum('role', [
                'admin',
                'accountant',
                'doctor',
                'pharmacist',
                'laboratorist',
                'peceptionist',
                'agent',
            ]);
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('avatar')->nullable();
            $table->string('e_phone')->nullable();
            $table->string('gender');
            $table->string('blood_group')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('qualification')->nullable();
            $table->string('experience')->nullable();
            $table->string('specialization')->nullable();

            $table->integer('b_salary')->nullable();
            $table->string('work_shift')->nullable();

            $table->string('p_address')->nullable();
            $table->string('c_address');

            $table->string('bank_account')->nullable();
            $table->string('bank_name')->nullable();
            $table->string('bank_branch')->nullable();
            $table->string('bank_account_no')->nullable();
            $table->string('bank_swift_no')->nullable();

            $table->string('social_fb')->nullable();
            $table->string('social_tw')->nullable();
            $table->string('social_li')->nullable();
            $table->string('social_in')->nullable();

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
        Schema::dropIfExists('staff');
    }
}
