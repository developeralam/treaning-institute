<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeStudentProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_profiles', function (Blueprint $table) {
            $table->string('studentId', 10)->change();
            $table->string('name', 190)->change();
            $table->string('fatherName', 190)->change();
            $table->string('motherName', 190)->change();
            $table->string('dob', 20)->change();
            $table->string('phoneNo', 20)->change();
            $table->string('guardianPhoneNo', 20)->nullable()->change();
            $table->string('email', 190)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_profiles', function (Blueprint $table) {
            //
        });
    }
}
