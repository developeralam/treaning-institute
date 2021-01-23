<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('year_id');
            $table->integer('session_id');
            $table->integer('batch_id');
            $table->integer('course_id');
            $table->integer('student_id');
            $table->string('student_name');
            $table->string('blood_group');
            $table->string('gender');
            $table->date('date_of_birth');
            $table->string('religion');
            $table->string('nationality');
            $table->string('photo');
            $table->string('profession');
            $table->string('organization_name');
            $table->string('designation');
            $table->string('phone');
            $table->string('email');
            $table->text('present_address');
            $table->text('permanent_address');
            $table->string('father_name');
            $table->string('father_phone');
            $table->string('mother_name');
            $table->string('mother_phone');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('student_profiles');
    }
}
