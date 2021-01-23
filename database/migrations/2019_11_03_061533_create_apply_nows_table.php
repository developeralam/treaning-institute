<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyNowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apply_nows', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',30);
            $table->string('fatherName',30);
            $table->string('motherName',30);
            $table->string('course');
            $table->string('phone',20);
            $table->string('email',30)->nullable();
            $table->string('guardianPhone',20)->nullable();
            $table->string('religion');
            $table->string('dob',40);
            $table->string('bloodGroup');
            $table->string('gender');
            $table->string('lastEduProfile',200);
            $table->string('presentAddress',70);
            $table->string('permanentAddress',350)->nullable();
            $table->text('image')->nullable();
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
        Schema::dropIfExists('apply_nows');
    }
}
