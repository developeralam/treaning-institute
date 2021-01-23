<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeApplyNowToApplyNowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apply_nows', function (Blueprint $table) {
            $table->string('name', 190)->change();
            $table->string('fatherName', 190)->change();
            $table->string('motherName', 190)->change();
            $table->string('email', 191)->nullable()->change();
            $table->string('presentAddress', 350)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apply_nows', function (Blueprint $table) {
            //
        });
    }
}
