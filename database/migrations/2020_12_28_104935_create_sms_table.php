<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('student_admission_online')->nullable();
            $table->text('student_admission_manual')->nullable();
            $table->text('student_approved')->nullable();
            $table->text('student_fee_collection')->nullable();
            $table->text('institute_income')->nullable();
            $table->text('institute_expence')->nullable();
            $table->text('student_payment_due')->nullable();
            $table->text('income_due')->nullable();
            $table->text('expence_due')->nullable();
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
        Schema::dropIfExists('sms');
    }
}
