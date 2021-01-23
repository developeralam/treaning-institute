<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDiscountChangeToStudentPaymentsTable extends Migration
{
 
    public function up()
    {
        Schema::table('student_payments', function (Blueprint $table) {
            $table->integer('discount')->default(0)->change();
        });
    }

 
    public function down()
    {
        Schema::table('student_payments', function (Blueprint $table) {
            //
        });
    }
}
