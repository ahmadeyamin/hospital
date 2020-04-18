<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->string('email')->unique();
            $table->enum('role', [
                'admin',
                'accountant',
                'doctor',
                'pharmacist',
                'laboratorist',
                'receptionist',
            ])->default('doctor');

            $table->string('phone');
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

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

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

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
