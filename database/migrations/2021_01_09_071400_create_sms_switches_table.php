<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsSwitchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_switches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('student_addmission_online_switch')->nullable();
            $table->integer('student_addmission_manual_switch')->nullable();
            $table->integer('student_approve_switch')->nullable();
            $table->integer('student_fee_collection_switch')->nullable();
            $table->integer('institute_income_switch')->nullable();
            $table->integer('institute_expence_switch')->nullable();
            $table->integer('student_payment_due_switch')->nullable();
            $table->integer('income_payment_due_switch')->nullable();
            $table->integer('expence_payment_due_switch')->nullable();
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
        Schema::dropIfExists('sms_switches');
    }
}
