<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplyNowChangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apply_nows', function (Blueprint $table) {
            $table->string('fatherName',30)->nullable()->change();
            $table->string('motherName',30)->nullable()->change();
            $table->string('religion')->nullable()->change();
            $table->string('phone',20)->nullable()->change();
            $table->string('dob',40)->nullable()->change();
            $table->string('bloodGroup')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->string('lastEduProfile',200)->nullable()->change();
            $table->string('presentAddress',70)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
}
