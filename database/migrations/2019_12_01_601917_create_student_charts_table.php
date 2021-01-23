<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentChartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_charts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('chart_of_account_id');
            $table->unsignedBigInteger('student_payment_id');
            $table->text('description');
            $table->double('amount', 10, 2);
            $table->timestamps();

            $table->foreign('chart_of_account_id')->references('id')->on('chart_of_accounts');
            $table->foreign('student_payment_id')->references('id')->on('student_payments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_charts');
    }
}
