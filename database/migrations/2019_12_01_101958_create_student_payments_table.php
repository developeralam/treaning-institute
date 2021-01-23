<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->integer('student_id');
            $table->date('date');
            $table->integer('type');
            $table->text('description');
            $table->integer('paybale_amount');
            $table->integer('paid_amount');
            $table->integer('due_amount');
            $table->integer('discount_amount')->nullable();
            $table->integer('status');  
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
        Schema::dropIfExists('student_payments');
    }
}
