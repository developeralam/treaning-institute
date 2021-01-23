<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('batch_id')->nullable();
            $table->integer('student_id')->nullable();
            $table->float('written')->nullable();
            $table->float('practical')->nullable();
            $table->float('viva')->nullable();
            $table->float('total')->nullable();
            $table->string('gpa')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('results');
    }
}
